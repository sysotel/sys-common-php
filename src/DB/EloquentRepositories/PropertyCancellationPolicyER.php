<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyAmenityEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyCancellationPolicyEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyProductEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertyAmenity\PropertyAmenity;
use SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\PropertyCancellationPolicy;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PropertyCancellationPolicyER extends EloquentRepository
{
    /**
     * @param Property|int $property
     * @return Collection
     */
    public function getActivePolicy(Property|int $property): Collection
    {
        return PropertyCancellationPolicy::query()
            ->wherePropertyId($property)
            ->whereStatus(CancellationPolicyStatus::ACTIVE)
            ->get();
    }

    /**
     * @param Property|int $property
     * @return Collection|PropertyCancellationPolicyEQB[]
     */
    public function getAllPolicy(Property|int $property): Collection|array
    {
        return PropertyCancellationPolicy::query()
            ->wherePropertyId($property)
            ->get();
    }

}
