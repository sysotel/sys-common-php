<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyAmenity;

use Jenssegers\Mongodb\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyAmenityEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertyAmenityER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertyAmenity\embedded\PropertyAmenityItem;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;

/**
 * @property ?int $id
* @property ?Account $accountId
 * @property ?int $propertyId
 * @property ?int $spaceId
 * @property ?AmenityTarget $target
 * @property ?Collection $amenities
 */
class PropertyAmenity extends Model
{
    protected $attributes = [
        'inclusions' => [],
    ];

    protected $casts = [
        'target' => AmenityTarget::class,
    ];

    protected static function booted(): void
    {
        static::creating(function (PropertyAmenity $amenity) {

            // sets auto incremental primary key
            $amenity->id = NumericIdGenerator::get($amenity);
        });
    }


    public function addAmenity(PropertyAmenityItem $val): static
    {
        $this->amenities()->save($val);
        return $this;
    }

    public function getAmenityItem(string $id)
    {
        return $this->amenities()->where('id', $id)->first();
    }



    public function amenities(): EmbedsMany
    {
        return $this->embedsMany(PropertyAmenityItem::class);
    }



    public static function query(): PropertyAmenityEQB
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): PropertyAmenityEQB
    {
        return new PropertyAmenityEQB($query);
    }

    /**
     * @return PropertyAmenityER
     */
    public static function repository(): PropertyAmenityER
    {
        return new PropertyAmenityER;
    }
}
