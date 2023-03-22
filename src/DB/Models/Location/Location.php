<?php

namespace SYSOTEL\APP\Common\DB\Models\Location;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\LocationEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\LocationER;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\common\Geo\GeoPoint;
use SYSOTEL\APP\Common\DB\Models\common\Geo\LocationReference;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;

/**
 * @property ?string $id
 * @property ?string $code
 * @property ?string $name
 * @property ?string $categorySlug
 * @property ?LocationType $type
 * @property ?GeoPoint $geoPoint
 * @property ?string $postalCode
 * @property ?LocationReference $city
 * @property ?LocationReference $state
 * @property ?LocationReference $country
 * @property array $searchKeywords
*/
class Location extends Model
{
    protected $attributes = [
        'searchKeywords' => []
    ];

    public function geoPoint(): EmbedsOne
    {
        return $this->embedsOne(GeoPoint::class);
    }

    public static function query(): LocationEQB
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): LocationEQB
    {
        return new LocationEQB($query);
    }

    public static function repository(): LocationER
    {
        return new LocationER;
    }
}
