<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertySpaceER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\InventorySettings;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\LateCheckOutStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;

/**
 * @property ?string $dailyStandardTime
 * @property ?LateCheckOutStatus $lateCheckOutStatus
 * @property ?string $details
*/
class CheckOutPolicy extends EmbeddedModel
{
    protected $casts = [
        'lateCheckOutStatus' => LateCheckOutStatus::class,
    ];

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
            LateCheckOutStatus::AS_PER_AVAILABILITY => 'Late checkout is allowed as per availability.',
            LateCheckOutStatus::ALLOWED => 'Late checkout is allowed.',
            LateCheckOutStatus::NOT_ALLOWED => 'Late checkout is NOT allowed.',
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
