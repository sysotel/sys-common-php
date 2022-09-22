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
     * @var string
     * @ODM\Field(type="string")
     */
    public $dailyStandardTime;

    /**
     * @var EarlyCheckInStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\EarlyCheckInStatus::class)
     */
    public $earlyCheckInStatus;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $details;

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
            EarlyCheckInStatus::ALLOWED => 'Early checkin is allowed as per availability.',
            EarlyCheckInStatus::NOT_ALLOWED => 'Early checkin is allowed.',
            EarlyCheckInStatus::AS_PER_AVAILABILITY => 'Early checkin is NOT allowed.',
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

        return $str;
    }
}
