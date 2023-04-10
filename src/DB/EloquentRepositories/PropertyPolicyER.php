<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyAmenityEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyProductEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertyAmenity\PropertyAmenity;
use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\PropertyPolicies;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PropertyPolicyER extends EloquentRepository
{
    /**
     * @param Property|int $property
     */
    public function findLatestPolicies(Property|int $property)
    {
        return PropertyPolicies::query()
            ->wherePropertyId($property)
            ->get();
    }

    /**
     * @param Property|int $property
     */
    public function findActivePolicies(Property|int $property)
    {
        return PropertyPolicies::query()
            ->wherePropertyId($property)
            ->whereStatus(PropertyPolicyStatus::ACTIVE)
            ->first();
    }

}
