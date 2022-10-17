<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy;

use Carbon\Carbon;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\EarlyCheckInStatus;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class CheckInPolicy extends EmbeddedDocument
{
    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $dailyStandardTime;

    /**
     * @var ?EarlyCheckInStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\EarlyCheckInStatus::class)
     */
    protected $earlyCheckInStatus;

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
     * @return CheckInPolicy
     */
    public function setDailyStandardTime(?string $dailyStandardTime): CheckInPolicy
    {
        $this->dailyStandardTime = $dailyStandardTime;
        return $this;
    }

    /**
     * @return EarlyCheckInStatus|null
     */
    public function getEarlyCheckInStatus(): ?EarlyCheckInStatus
    {
        return $this->earlyCheckInStatus;
    }

    /**
     * @param EarlyCheckInStatus|null $earlyCheckInStatus
     * @return CheckInPolicy
     */
    public function setEarlyCheckInStatus(?EarlyCheckInStatus $earlyCheckInStatus): CheckInPolicy
    {
        $this->earlyCheckInStatus = $earlyCheckInStatus;
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
     * @return CheckInPolicy
     */
    public function setDetails(?string $details): CheckInPolicy
    {
        $this->details = $details;
        return $this;
    }


    /**
     * @return string
     */
    public function checkInTimeDescription(): string
    {
        if($this->dailyStandardTime) {
            return 'Standard daily check-in time is ' . Carbon::createFromFormat('H:i', $this->dailyStandardTime)->format('h:i A');
        }

        return '';
    }

    /**
     * @return string
     */
    public function earlyCheckInDescription(): string
    {
        return match($this->earlyCheckInStatus) {
            EarlyCheckInStatus::AS_PER_AVAILABILITY => 'Early checkin is allowed as per availability.',
            EarlyCheckInStatus::ALLOWED => 'Early checkin is allowed.',
            EarlyCheckInStatus::NOT_ALLOWED => 'Early checkin is NOT allowed.',
            default => ''
        };
    }

    /**
     * @return string
     */
    public function fullDescription(): string
    {
        $str = $this->checkInTimeDescription();

        if(!empty($str)) $str .= ' ';

        $str .= $this->earlyCheckInDescription();

        if(!empty($str)) $str .= ' ';

        if($this->details){
            $str .= $this->details;
        }

        return trim($str);
    }
}
