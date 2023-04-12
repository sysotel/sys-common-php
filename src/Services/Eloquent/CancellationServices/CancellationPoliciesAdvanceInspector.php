<?php

namespace SYSOTEL\APP\Common\Services\Eloquent\CancellationServices;

use Carbon\Carbon;
use SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\embedded\CancellationPolicyRule;
use SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\PropertyCancellationPolicy;
use SYSOTEL\APP\Common\Enums\CMS\PenaltyType;

class CancellationPoliciesAdvanceInspector extends CancellationPoliciesBaseInspector
{
    /**
     * @var Carbon
     */
    protected Carbon $checkInTime;

    public function __construct(PropertyCancellationPolicy $cancellationPolicy, Carbon $checkInDate)
    {
        parent::__construct($cancellationPolicy);

        $this->checkInTime = $checkInDate->copy();
    }

    /**
     * @return array
     */
    public function getAllSentences(): array
    {
        $ruleSentences[] = $this->freeCancellationSentence();

        foreach ($this->cancellationPolicy->rules as $rule) {
            $ruleSentences[] = $this->ruleSentence($rule);
        }

        return $ruleSentences;
    }

    /**
     * @param Carbon $bookingTime
     * @return array
     */
    public function getAllSentencesForBookingDate(Carbon $bookingTime): array
    {
        $ruleSentences = [];

        $cancellationThresholdDate = $this->getFreeCancellationThresholdTimestamp();
        if($bookingTime->lte($cancellationThresholdDate)) {
            $ruleSentences[] = $this->freeCancellationSentence();
        }

        foreach ($this->cancellationPolicy->rules as $rule) {
            $ruleEndTime = $this->getEndTimeForRule($rule);
            if($bookingTime->lte($ruleEndTime)) {
                $ruleSentences[] = $this->ruleSentence($rule);
            }
        }

        if(!count($ruleSentences)) {
            $ruleSentences[] = '100% penalty will be charged if cancelled this booking.';
        }

        return $ruleSentences;
    }

    /**
     * @return string
     */
    public function freeCancellationSentence(): string
    {
        $cancellationThresholdDate = $this->getFreeCancellationThresholdTimestamp();

        $cancellationThresholdDateString = $cancellationThresholdDate->format('d M Y, H:i');

        return "FULL REFUND IF CANCELLED ON OR BEFORE $cancellationThresholdDateString";
    }

    /**
     * @param CancellationPolicyRule $rule
     * @return string
     */
    public function ruleSentence(CancellationPolicyRule $rule): string
    {
        $penaltyLabel = CancellationHelpers::getPenaltyLabel($rule->penalty);

        $startTime = $this->getStartTimeForRule($rule);
        $startTimeString = $startTime->format('d M Y, H:i');

        $endTime = $this->getEndTimeForRule($rule);
        $endTimeString = $endTime->format('d M Y, H:i');

        if ($rule->endInterval === 0) {
            return "$penaltyLabel penalty if cancelled after $startTimeString";
        }

        return "$penaltyLabel penalty if cancelled between $startTimeString to $endTimeString";
    }

    /**
     * @return Carbon
     */
    public function getFreeCancellationThresholdTimestamp(): Carbon
    {
        // normalize upto seconds
        $this->checkInTime->setSecond(0);

        // free cancellation applies before (checkInTime minus freeCancellationBefore hours)
        // that's why we first minus hours from checkIn time and then sub one second from it.
        return $this->checkInTime->clone()->subHours($this->cancellationPolicy->freeCancellationBefore)->subSecond();
    }

    /**
     * @param CancellationPolicyRule $rule
     * @return Carbon
     */
    protected function getStartTimeForRule(CancellationPolicyRule $rule): Carbon
    {
        return $this->checkInTime->copy()->subHours($rule->startInterval);
    }

    /**
     * @param CancellationPolicyRule $rule
     * @return Carbon
     */
    protected function getEndTimeForRule(CancellationPolicyRule $rule): Carbon
    {
        return $this->checkInTime->copy()->subHours($rule->endInterval)->subSecond();
    }

    /**
     * @param Carbon $cancellationTime
     * @return CancellationPolicyRule|null
     */
    public function getApplicableRule(Carbon $cancellationTime): ?CancellationPolicyRule
    {
        // normalize cancellation date
        $cancellationTime = $cancellationTime->copy()->setSeconds(0);

        foreach ($this->cancellationPolicy->rules as $rule) {
            $startTime = $this->getStartTimeForRule($rule);
            $endTime = $this->getEndTimeForRule($rule);

            if ($cancellationTime->gte($startTime) && $cancellationTime->lte($endTime)) {
                return $rule;
            }
        }

        return null;
    }

    /**
     * @param Carbon $cancellationTime
     * @return bool
     */
    public function isNonRefundable(Carbon $cancellationTime): bool
    {
        // normalize
        $cancellationTime = $cancellationTime->copy()->setSeconds(0);

        // if free cancellation available, means it's NOT nonRefundable
        if($this->isFreeCancellationAvailableForCancellationTime($cancellationTime)) {
            return false;
        }


        $applicableRule = $this->getApplicableRule($cancellationTime);

        // if no applicable rule is found, means booking is nonRefundable
        if (!isset($applicableRule)) {
            return true;
        }

        // if penalty is 100% or more penalty
        // it means booking is nonRefundable
        if($applicableRule->penalty?->isOfType(PenaltyType::PERC) && $applicableRule->penalty?->value >= 100) {
            return true;
        }

        // if penalty is greater than booking amount,
        // it means booking is nonRefundable
//        if($applicableRule->getPenalty()?->isOfType(PenaltyType::FLAT) && $applicableRule->getPenalty()?->getValue() >= $bookingAmount) {
//            return true;
//        }

        return false;
    }

    /**
     * @param Carbon $cancellationTime
     * @return bool
     */
    public function isFreeCancellationAvailableForCancellationTime(Carbon $cancellationTime): bool
    {
        // normalize
        $cancellationTime = $cancellationTime->copy()->setSeconds(0);

        $cancellationThresholdDate = $this->getFreeCancellationThresholdTimestamp();

        // if last cancellation time is after booking date
        // it means if you book now, free cancellation will be available
        return $cancellationTime->lt($cancellationThresholdDate);
    }

    /**
     * @param Carbon $bookingDate
     * @return bool
     */
    public function isFreeCancellationAvailableForBookingTime(Carbon $bookingDate): bool
    {
        // normalize
        $bookingDate = $bookingDate->copy()->setSeconds(0);

        $cancellationThresholdDate = $this->getFreeCancellationThresholdTimestamp();

        // if last cancellation time is after booking date
        // it means if you book now, free cancellation will be available
        return $bookingDate->lt($cancellationThresholdDate);
    }
}
