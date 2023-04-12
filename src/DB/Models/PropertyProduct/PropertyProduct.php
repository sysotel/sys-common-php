<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyProduct;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyProductEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertyProductER;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\embedded\PaymentMode;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\MealPlanCode;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

/**
 * @property ?int $id
 * @property ?Account $accountId
 * @property ?int $propertyId
 * @property ?int $spaceId
 * @property ?string $displayName
 * @property ?string $internalName
 * @property ?string $shortDescription
 * @property ?string $longDescription
 * @property ?PaymentMode $paymentMode
 * @property ?MealPlanCode $mealPlanCode
 *  @property ?PropertyProductStatus $status
 * @property ?array $inclusions
*/
class PropertyProduct extends Model
{
    protected $collection = 'propertyProducts';
    protected $attributes = [
        'inclusions' => [],
        'status' => PropertySpaceStatus::ACTIVE,
    ];

    protected $casts = [
        'accountId' => Account::class,
        'mealPlanCode' => MealPlanCode::class,
        'status' => PropertyProductStatus::class,
    ];

    public function paymentMode(): EmbedsOne
    {
        return $this->embedsOne(PaymentMode::class);
    }

    public static function query(): PropertyProductEQB
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): PropertyProductEQB
    {
        return new PropertyProductEQB($query);
    }

    /**
     * @return PropertyProductER
     */
    public static function repository(): PropertyProductER
    {
        return new PropertyProductER;
    }
}
