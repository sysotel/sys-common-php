<?php

namespace SYSOTEL\APP\Common\DB\Models\Property;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\ArrayGenerators\PropertyDataGenerator;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertyER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Helpers\PropertySlugGenerator;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\common\Geo\Address;
use SYSOTEL\APP\Common\DB\Models\common\UserReference;
use SYSOTEL\APP\Common\DB\Models\Property\embedded\SocialMediaDetails;
use SYSOTEL\APP\Common\DB\Observers\PropertyObserver;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyCreationType;
use SYSOTEL\APP\Common\Enums\CMS\PropertyStarRating;
use SYSOTEL\APP\Common\Enums\CMS\PropertyStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyType;
use SYSOTEL\APP\Common\Enums\CMS\Timezone;
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
 * @property ?string $shortDescription
 * @property ?string $longDescription
 * @property ?Timezone $timezone
 * @property ?PropertyStatus $status
 * @property ?UserReference $creator
 * @property ?Carbon $createdAt
 * @property ?Carbon $updatedAt
 */
class Property extends Model
{
    protected $collection = 'properties';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->status = PropertyStatus::ACTIVE;
    }

    protected $attributes = [
        'allowedBookingTypes' => [],
        'timezone' => Timezone::ASIA_KOLKATA,
        'baseCurrency' => Currency::INR,
     //   'status' => PropertyStatus::ACTIVE,
    ];

    protected $casts = [
        'accountId' => Account::class,
        'starRating' => PropertyStarRating::class,
        'type' => PropertyType::class,
        'baseCurrency' => Currency::class,
        'creationType' => PropertyCreationType::class,
        'timezone' => Timezone::class,
        'status' => PropertyStatus::class,
    ];

    public function address(): EmbedsOne
    {
        return $this->embedsOne(Address::class);
    }

    public function socialMediaDetails(): EmbedsOne
    {
        return $this->embedsOne(SocialMediaDetails::class);
    }

    public function creator(): EmbedsOne
    {
        return $this->embedsOne(UserReference::class);
    }

    public static function query(): PropertyEQB
    {
        return parent::query();
    }

    /**
     * @param $query
     * @return PropertyEQB
     */
    public function newEloquentBuilder($query): PropertyEQB
    {
        return new PropertyEQB($query);
    }

    public static function repository(): PropertyER
    {
        return new PropertyER;
    }

    public function getArrayGenerator(): PropertyDataGenerator
    {
        return new PropertyDataGenerator($this);
    }
}
