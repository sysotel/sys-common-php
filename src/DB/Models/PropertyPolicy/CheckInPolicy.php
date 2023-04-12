<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy;

use Carbon\Carbon;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\CMS\EarlyCheckInStatus;
/**
 * @property ?string $dailyStandardTime
 * @property ?EarlyCheckInStatus $earlyCheckInStatus
 * @property ?string $details
 */
class CheckInPolicy extends EmbeddedModel
{

    protected $casts = [
        'earlyCheckInStatus' => EarlyCheckInStatus::class,

    ];

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
