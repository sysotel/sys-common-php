<?php

namespace SYSOTEL\APP\Common\Services\CancellationServices;

use Carbon\Carbon;
use SYSOTEL\APP\Common\Enums\CMS\PenaltyType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\CancellationPolicyRules;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\Penalty;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\PropertyCancellationPolicy;

class CancellationPoliciesInspector
{
    /**
     * @var PropertyCancellationPolicy
     */
    protected PropertyCancellationPolicy $cancellationPolicy;

    public function __construct(PropertyCancellationPolicy $cancellationPolicy)
    {
        $this->cancellationPolicy = $cancellationPolicy;
    }

    /**
     * @return array
     */
    public function getAllSentences(): array
    {
        $ruleSentences[] = $this->sentenceForFreeCancellation();

        foreach ($this->cancellationPolicy->getRules() as $rule) {
            $ruleSentences[] = $this->sentenceForRule($rule);
        }

        return $ruleSentences;
    }

    /**
     * @param Carbon $checkInDate
     * @return array
     */
    public function getAllSentencesForCheckInDate(Carbon $checkInDate): array
    {
        $ruleSentences[] = $this->sentenceForFreeCancellationForCheckInDate($checkInDate);

        foreach ($this->cancellationPolicy->getRules() as $rule) {
            $ruleSentences[] = $this->sentencesForRuleForCheckInDate($rule, $checkInDate);
        }
        return $ruleSentences;
    }

    /**
     * @param Carbon $checkInDate
     * @param Carbon $cancellationDate
     * @return string
     */
    public function getCancellationSentencesForDates(Carbon $checkInDate, Carbon $cancellationDate): string
    {
        $freeCancellationAvailable = $this->isFreeCancellationAvailable($checkInDate, $cancellationDate);
        if ($freeCancellationAvailable) {
            return "Free cancellation available if you cancel by " . $cancellationDate->toDateTimeString();
        }
        $nonRefundable = $this->isNonRefundable($checkInDate, $cancellationDate);
        if ($nonRefundable) {
            return "The booking is non refundable";
        }

        $cancellationRule = $this->getRuleForDates($checkInDate, $cancellationDate);
        if ($cancellationRule) {
            return $this->sentencesForRuleForCheckInDate($cancellationRule, $checkInDate);
        }

        return "";

    }

    /**
     * @param Carbon $checkInDate
     * @param Carbon $cancellationDate
     * @return bool
     */
    public function isNonRefundable(Carbon $checkInDate, Carbon $cancellationDate): bool
    {
        $cancellationRule = $this->getRuleForDates($checkInDate, $cancellationDate);
        $cancellationAvailable = $this->isFreeCancellationAvailable($checkInDate, $cancellationDate);

        if (!isset($cancellationAvailable)) {
            return true;
        }

        if (!isset($cancellationRule)) {
            return true;
        }

        if ($cancellationRule->getPenalty()->getValue() == 100) {
            return true;
        };

        return false;
    }


    /**
     * @return string
     */
    public function sentenceForFreeCancellation(): string
    {
        $sentence = 'FULL REFUND IF CANCELLED BEFORE ';

        $freeCancellationBeforeHours = $this->cancellationPolicy->getFreeCancellationBefore();
        $freeCancellationBeforeDays = $freeCancellationBeforeHours / 24;
        $getLabel = $this->getDayOrHourLabel($freeCancellationBeforeHours);
        $sentence .= $freeCancellationBeforeDays . ' ' . $getLabel;
        return $sentence;

    }

    /**
     * @param Carbon $checkInDate
     * @return string
     */
    public function sentenceForFreeCancellationForCheckInDate(Carbon $checkInDate): string
    {
        $sentence = 'FULL REFUND IF CANCELLED ON OR BEFORE';

        $cancellationThresholdDate = $this->getFreeCancellationThresholdDate($checkInDate);

        $sentence .= ' ' . $cancellationThresholdDate->toDateTimeString();

        return $sentence;
    }

    /**
     * @param CancellationPolicyRules $rule
     * @return string
     */
    public function sentenceForRule(CancellationPolicyRules $rule): string
    {
        $penaltyLabel = $this->getPenaltyLabel($rule->getPenalty());

        $endIntervalInDays = $rule->getEndInterval() / 24;
        $dayLabelForEnd = $this->getDayOrHourLabel($rule->getEndInterval());

        $startIntervalInDays = $rule->getStartInterval() / 24;
        $dayLabelForStart = $this->getDayOrHourLabel($rule->getStartInterval());

        if ($rule->getEndInterval() == 0) {
            return "Penalty $penaltyLabel if cancelled between $startIntervalInDays $dayLabelForEnd to checking date";
        }

        return "Penalty $penaltyLabel if cancelled between $startIntervalInDays $dayLabelForEnd to $endIntervalInDays $dayLabelForStart before checking date";
    }

    /**
     * @param CancellationPolicyRules $rule
     * @param Carbon $checkInDate
     * @return string
     */
    public function sentencesForRuleForCheckInDate(CancellationPolicyRules $rule, Carbon $checkInDate): string
    {
        $penaltyLabel = $this->getPenaltyLabel($rule->getPenalty());


        $startInterval = $checkInDate->copy()->subHours($rule->getStartInterval())->toDateTimeString();
        $endInterval = $checkInDate->copy()->subHours($rule->getEndInterval())->subSecond()->toDateTimeString();


        if ($endInterval == $checkInDate) {
            return "$penaltyLabel penalty if cancelled after $startInterval";
        }

        return "$penaltyLabel penalty if cancelled between $startInterval to $endInterval";
    }

    /**
     * @param Carbon $checkInDate
     * @param Carbon $cancellationDate
     * @return CancellationPolicyRules|null
     */
    public function getRuleForDates(Carbon $checkInDate, Carbon $cancellationDate): CancellationPolicyRules|null
    {
        $cancelDate = $this->normalizeCancellationDate($cancellationDate);
        foreach ($this->cancellationPolicy->getRules() as $rule) {
            $startDate = $checkInDate->copy()->subHours($rule->getStartInterval())->toDateTimeString();
            $endDate = $checkInDate->copy()->subHours($rule->getEndInterval())->subSeconds()->toDateTimeString();
            if ($cancelDate->gte($startDate) && $cancelDate->lte($endDate)) {
                return $rule;
            }
        }
        return null;
    }

    /**
     * @param Carbon $checkInDate
     * @param Carbon $cancellationDate
     * @return bool
     */
    public function isFreeCancellationAvailable(Carbon $checkInDate, Carbon $cancellationDate): bool
    {
        $cancelDate = $this->normalizeCancellationDate($cancellationDate);
        $freeCancellationThresholdDate = $this->getFreeCancellationThresholdDate($checkInDate);

        $flag = $cancelDate->lt($freeCancellationThresholdDate);
        if ($flag) {
            return true;
        }

        $cancellationRule = $this->getRuleForDates($checkInDate, $cancellationDate);
        if (isset($cancellationRule) && $cancellationRule->getPenalty()->getValue() == 0) {
            return true;
        };
        return false;
    }


    /**
     * @param Carbon $checkInDate
     * @return Carbon
     */
    public function getFreeCancellationThresholdDate(Carbon $checkInDate): Carbon
    {
        return $checkInDate->clone()->subHours($this->cancellationPolicy->getFreeCancellationBefore())->subSeconds();
    }

    /**
     * @param int $hours
     * @return string
     */
    public function getDayOrHourLabel(int $hours): string
    {
        $days = $hours / 24;
        return is_int($days)
            ? $this->getDayLabel($hours)
            : $this->getHourLabel($hours);
    }

    /**
     * @param int $days
     * @return string
     */
    protected function getDayLabel(int $days): string
    {
        return $days > 1 ? 'days' : 'day';
    }

    /**
     * @param int $hour
     * @return string
     */
    protected function getHourLabel(int $hour): string
    {
        return $hour > 1 ? 'hours' : 'hour';
    }

    /**
     * @param Penalty $penalty
     * @return string
     */
    protected function getPenaltyLabel(Penalty $penalty): string
    {
        $value = $penalty->getValue();

        return ($penalty->getType() == PenaltyType::PERC)
            ? "$value%"
            : "$value INR";
    }

    /**
     * @param Carbon $date
     * @return Carbon
     */
    public function normalizeCancellationDate(Carbon $date): Carbon
    {
        return $date->setMillis(0);
    }
}
