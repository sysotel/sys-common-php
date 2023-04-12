<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyPolicyEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertyPolicyER;
use SYSOTEL\APP\Common\DB\Models\common\UserReference;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\InventorySettings;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus;

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
    protected $collection = 'propertyPolicies';
    protected $attributes = [
        'status' => PropertyPolicyStatus::ACTIVE,
    ];

    protected $casts = [
        'status' => PropertyPolicyStatus::class,
    ];

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

    public function rules(): EmbedsOne
    {
        return $this->embedsOne(PropertyRules::class);
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
