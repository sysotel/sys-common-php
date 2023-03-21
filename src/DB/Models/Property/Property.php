<?php

namespace SYSOTEL\APP\Common\DB\Models\Property;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\BaseModel;
use SYSOTEL\APP\Common\DB\Models\common\Geo\Address;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyCreationType;
use SYSOTEL\APP\Common\Enums\CMS\PropertyStarRating;
use SYSOTEL\APP\Common\Enums\CMS\PropertyType;
use SYSOTEL\APP\Common\Enums\Currency;

/**
 * @property ?int $id
 * @property ?string $displayName
 * @property ?Account $accountId
 * @property ?string $accountSlug
 * @property ?string $slug
 * @property ?PropertyStarRating $starRating
 * @property ?PropertyType $type
 * @property ?array $allowedBookingTypes
 * @property ?string $propertyLabel
 * @property ?string $spaceLabel
 * @property ?string $productLabel
 * @property ?Currency $baseCurrency
 * @property ?Address $address
 * @property ?int $noOfSpaces
 * @property ?int $noOfFloors
 * @property ?int $buildYear
 * @property ?PropertyCreationType $creationType
 * @property ?Carbon $createdAt
 * @property ?Carbon $updatedAt
 */
class Property extends BaseModel
{
    protected $attributes = [
        'allowedBookingTypes' => []
    ];

    protected $casts = [
        'accountId' => Account::class,
        'starRating' => PropertyStarRating::class,
        'type' => PropertyType::class,
        'baseCurrency' => Currency::class,
        'creationType' => PropertyCreationType::class,
        'createdAt' => 'datetime',
        'updatedAt' => 'datetime',
    ];

    public function address(): EmbedsOne
    {
        return $this->embedsOne(Address::class);
    }

    /**
     * @param $query
     * @return PropertyEloquentBuilder
     */
    public function newEloquentBuilder($query): PropertyEloquentBuilder
    {
        return new PropertyEloquentBuilder($query);
    }
}
