<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyAmenityEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyProductEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertyAmenity\PropertyAmenity;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PropertyAmenityER extends EloquentRepository
{
    /**
     * @param Property|int $property
     * @return Collection & PropertyAmenity
     */
    public function getPropertyAmenities(Property|int $property)
    {
        return PropertyAmenity::query()
            ->wherePropertyId($property)
            ->whereTarget(AmenityTarget::PROPERTY)
            ->get();
    }

    /**
     * @param int $spaceId
     * @param Property|int $property
     * @return Model|object|PropertyAmenityEQB|null
     */
    public function getSpaceAmenities(int $spaceId, Property|int $property)
    {
        return PropertyAmenity::query()
            ->wherePropertyId($property)
            ->where('spaceId', $spaceId )
            ->whereTarget(AmenityTarget::SPACE)
            ->first();
    }

}
