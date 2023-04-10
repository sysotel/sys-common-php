<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyNearbyPlace\embedded;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyProductEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertyProductER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\common\Geo\GeoPoint;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\embedded\PaymentMode;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\MealPlanCode;
use SYSOTEL\APP\Common\Enums\CMS\NearbyPlaceCategory;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

/**
 * @property ?int $id
 * @property ?string $name
 * @property ?string $description
 * @property ?NearbyPlaceCategory $category
 * @property ?GeoPoint $geoPoint
 */
class NearbyPlaceItem extends Model
{

    protected $casts = [
        'category' => NearbyPlaceCategory::class,
    ];



    public function geoPoint(): EmbedsOne
    {
        return $this->embedsOne(GeoPoint::class);
    }


}
