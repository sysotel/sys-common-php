<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy;

use Carbon\Carbon;
use Jenssegers\Mongodb\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyPolicyEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertyPolicyER;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertySpaceER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\common\UserReference;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\InventorySettings;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;

/**
 * @property ?int $id
 * @property ?Account $accountId
 * @property ?int $propertyId
 * @property ?CustomPolicyItem $generalPolicy
 * @property ?AgePolicy $agePolicy
 * @property ?CheckInPolicy $checkInPolicy
 * @property ?CheckOutPolicy $checkOutPolicy
 * @property ?Collection $rules
 * @property ?CustomPolicyItem $customPolicies
 * @property ?PropertyPolicyStatus $status
 * @property ?Carbon $expiredAt
 * @property ?UserReference $causer
 * @property ?InventorySettings $inventorySettings
 * @property ?int $sortOrder
*/
class PropertyPolicies extends Model
{
    protected $attributes = [
        'status' => PropertyPolicyStatus::ACTIVE,
    ];

    protected $casts = [
        'status' => PropertyPolicyStatus::class,
    ];

    protected static function booted(): void
    {
        static::creating(function (PropertyPolicies $policy) {

            // sets auto incremental primary key
            $policy->id = NumericIdGenerator::get($policy);
        });
    }

    public function generalPolicy(): EmbedsOne
    {
        return $this->embedsOne(CustomPolicyItem::class);
    }

    public function agePolicy(): EmbedsOne
    {
        return $this->embedsOne(AgePolicy::class);
    }

    public function checkInPolicy(): EmbedsOne
    {
        return $this->embedsOne(CheckInPolicy::class);
    }

    public function checkOutPolicy(): EmbedsOne
    {
        return $this->embedsOne(CheckOutPolicy::class);
    }

    public function rules(): EmbedsMany
    {
        return $this->embedsMany(CustomPolicyItem::class);
    }

    public function causer(): EmbedsOne
    {
        return $this->embedsOne(UserReference::class);
    }

    public static function query(): PropertyPolicyEQB
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): PropertyPolicyEQB
    {
        return new PropertyPolicyEQB($query);
    }

    /**
     * @return PropertyPolicyER
     */
    public static function repository(): PropertyPolicyER
    {
        return new PropertyPolicyER;
    }

    /**
     * @return $this
     */
    public function markAsExpired(): self
    {
        $this->status = PropertyPolicyStatus::EXPIRED;
        $this->expiredAt = now();
        return $this;
    }
}
