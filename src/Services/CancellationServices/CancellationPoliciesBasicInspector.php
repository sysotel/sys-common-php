<?php

namespace SYSOTEL\APP\Common\Services\CancellationServices;

use Carbon\Carbon;
use SYSOTEL\APP\Common\Enums\CMS\PenaltyType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\CancellationPolicyRules;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\Penalty;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\PropertyCancellationPolicy;

class CancellationPoliciesBasicInspector
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
        $ruleSentences[] = $this->freeCancellationSentence();

        foreach ($this->cancellationPolicy->getRules() as $rule) {
            $ruleSentences[] = $this->ruleSentence($rule);
        }

        return $ruleSentences;
    }

    /**
     * @return string
     */
    public function freeCancellationSentence(): string
    {
        $freeCancellationBeforeHours = $this->cancellationPolicy->getFreeCancellationBefore();

        $timeLabel = CancellationHelpers::getDayOrHourLabel($freeCancellationBeforeHours);

        return "FULL REFUND IF CANCELLED BEFORE  $timeLabel";
    }

    /**
     * @param CancellationPolicyRules $rule
     * @return string
     */
    public function ruleSentence(CancellationPolicyRules $rule): string
    {
        $penaltyLabel = CancellationHelpers::getPenaltyLabel($rule->getPenalty());

        $timeLabelForEnd = CancellationHelpers::getDayOrHourLabel($rule->getEndInterval());

        $timeLabelForStart = CancellationHelpers::getDayOrHourLabel($rule->getStartInterval());

        if ($rule->getEndInterval() == 0) {
            return "Penalty $penaltyLabel if cancelled within $timeLabelForStart from checking date";
        }

        return "Penalty $penaltyLabel if cancelled between $timeLabelForStart to $timeLabelForEnd before checking date";
    }
}
