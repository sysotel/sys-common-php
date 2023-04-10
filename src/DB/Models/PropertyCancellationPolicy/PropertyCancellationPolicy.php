<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyCancellationPolicyEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertyCancellationPolicyER;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertySpaceER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\embedded\CancellationPolicyRule;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\InventorySettings;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;

/**
 * @property ?int $id
 * @property ?Account $accountId
 * @property ?int $propertyId
 * @property ?CancellationPolicyStatus $status
 * @property ?Carbon $expiredAt
 * @property ?int $freeCancellationBefore
 * @property ?CancellationPolicyRule $rules
 */
class PropertyCancellationPolicy extends Model
{

    protected $casts = [
        'status' => CancellationPolicyStatus::class,
    ];

//    protected static function booted(): void
//    {
//        static::creating(function (PropertyCancellationPolicy $cancellationPolicy) {
//
//            // sets auto incremental primary key
//            $cancellationPolicy->id = NumericIdGenerator::get($cancellationPolicy);
//        });
//    }

    public function rules(): EmbedsMany
    {
        return $this->EmbedsMany(CancellationPolicyRule::class);
    }

    public function addRule(CancellationPolicyRule $val): static
    {
        $this->rules()->save($val);
        return $this;
    }


    public static function query(): PropertyCancellationPolicyEQB
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): PropertyCancellationPolicyEQB
    {
        return new PropertyCancellationPolicyEQB($query);
    }

    /**
     * @return PropertyCancellationPolicyER
     */
    public static function repository(): PropertyCancellationPolicyER
    {
        return new PropertyCancellationPolicyER;
    }


    /**
     * @return $this
     */
    public function markAsExpired(): static
    {
        $this->status = CancellationPolicyStatus::EXPIRED;
        $this->expiredAt = now();
        return $this;
    }

}
