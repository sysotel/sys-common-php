<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy;

use Carbon\Carbon;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\EarlyCheckInStatus;
use SYSOTEL\APP\Common\Enums\CMS\LateCheckOutStatus;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class CheckOutPolicy extends EmbeddedDocument
{
    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $dailyStandardTime;

    /**
     * @var ?LateCheckOutStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\LateCheckOutStatus::class)
     */
    protected $lateCheckOutStatus;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $details;

    /**
     * @return string|null
     */
    public function getDailyStandardTime(): ?string
    {
        return $this->dailyStandardTime;
    }

    /**
     * @param string|null $dailyStandardTime
     * @return CheckOutPolicy
     */
    public function setDailyStandardTime(?string $dailyStandardTime): CheckOutPolicy
    {
        $this->dailyStandardTime = $dailyStandardTime;
        return $this;
    }

    /**
     * @return LateCheckOutStatus|null
     */
    public function getLateCheckOutStatus(): ?LateCheckOutStatus
    {
        return $this->lateCheckOutStatus;
    }

    /**
     * @param LateCheckOutStatus|null $lateCheckOutStatus
     * @return CheckOutPolicy
     */
    public function setLateCheckOutStatus(?LateCheckOutStatus $lateCheckOutStatus): CheckOutPolicy
    {
        $this->lateCheckOutStatus = $lateCheckOutStatus;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDetails(): ?string
    {
        return $this->details;
    }

    /**
     * @param string|null $details
     * @return CheckOutPolicy
     */
    public function setDetails(?string $details): CheckOutPolicy
    {
        $this->details = $details;
        return $this;
    }

    /**
     * @return string
     */
    public function checkOutTimeDescription(): string
    {
        if($this->dailyStandardTime) {
            return 'Standard daily check-in time is ' . Carbon::createFromFormat('H:i', $this->dailyStandardTime)->format('h:i A');
        }

        return '';
    }

    /**
     * @return string
     */
    public function lateCheckoutDescription(): string
    {
        return match($this->lateCheckOutStatus) {
            LateCheckOutStatus::ALLOWED => 'Late checkout is allowed as per availability.',
            LateCheckOutStatus::NOT_ALLOWED => 'Late checkout is allowed.',
            LateCheckOutStatus::AS_PER_AVAILABILITY => 'Late checkout is NOT allowed.',
            default => ''
        };
    }

    /**
     * @return string
     */
    public function fullDescription(): string
    {
        $str = $this->checkOutTimeDescription();

        if(!empty($str)) $str .= ' ';

        $str .= $this->lateCheckoutDescription();

        if(!empty($str)) $str .= ' ';

        if($this->details){
            $str .= $this->details;
        }

        return trim($str);
    }
}
