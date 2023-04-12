<?php

namespace SYSOTEL\APP\Common\Services\Eloquent\CancellationServices;


use SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\embedded\CancellationPolicyRule;

class CancellationPoliciesBasicInspector extends CancellationPoliciesBaseInspector
{
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
     * @return string
     */
    public function freeCancellationSentence(): string
    {
        $freeCancellationBeforeHours = $this->cancellationPolicy->freeCancellationBefore;

        $timeLabel = CancellationHelpers::getDayOrHourLabel($freeCancellationBeforeHours);

        return "FULL REFUND IF CANCELLED BEFORE  $timeLabel";
    }

    /**
     * @param CancellationPolicyRule $rule
     * @return string
     */
    public function ruleSentence(CancellationPolicyRule $rule): string
    {
        $penaltyLabel = CancellationHelpers::getPenaltyLabel($rule->penalty);

        $timeLabelForEnd = CancellationHelpers::getDayOrHourLabel($rule->endInterval);

        $timeLabelForStart = CancellationHelpers::getDayOrHourLabel($rule->startInterval);

        if ($rule->endInterval == 0) {
            return "Penalty $penaltyLabel if cancelled within $timeLabelForStart from checking date";
        }

        return "Penalty $penaltyLabel if cancelled between $timeLabelForStart to $timeLabelForEnd before checking date";
    }
}
