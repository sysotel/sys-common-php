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
     * @var string
     * @ODM\Field(type="string")
     */
    public $dailyStandardTime;

    /**
     * @var LateCheckOutStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\LateCheckOutStatus::class)
     */
    public $lateCheckOutStatus;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $details;

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
