<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PropertySpaceER extends EloquentRepository
{
    /**
     * @param Property|int $property
     * @return Collection & PropertySpace[]
     */
    public function getAllForProperty(Property|int $property, PropertySpaceStatus $status = null)
    {
        return PropertySpace::query()
            ->wherePropertyId($property)
            ->when($status, fn($q) => $q->whereStatus($status))
            ->get();
    }

    /**
     * @param int $spaceId
     * @param Property|int $property
     */
    public function getByIdAndPropertyId(int $spaceId, Property|int $property)
    {
        return PropertySpace::query()
            ->where('id', $spaceId)
            ->wherePropertyId($property)
            ->first();
    }

    public function getAllDailySpacesForProperty(Property|int $property, PropertySpaceStatus $status = null)
    {
        return PropertySpace::query()
            ->wherePropertyId($property)
            ->whereDailySpace()
            ->when($status, fn($q) => $q->whereStatus($status))
            ->get();
    }

    public function getAllHourlySpacesForProperty(Property|int $property, PropertySpaceStatus $status = null)
    {
        return PropertySpace::query()
            ->wherePropertyId($property)
            ->whereHourlySpace()
            ->when($status, fn($q) => $q->whereStatus($status))
            ->get();
    }

}
