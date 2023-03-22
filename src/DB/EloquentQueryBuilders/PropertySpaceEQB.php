<?php

namespace SYSOTEL\APP\Common\DB\EloquentQueryBuilders;

use Jenssegers\Mongodb\Eloquent\Builder;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\Enums\CMS\InventoryAccuracy;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PropertySpaceEQB extends Builder
{
    public function wherePropertyId(int|Property $property): PropertySpaceEQB
    {
        $propertyId = $property instanceof Property
            ? $property->id
            : $property;

        return $this->where('propertyId', $propertyId);
    }

    public function whereStatus(PropertySpaceStatus $status): PropertySpaceEQB
    {
        return $this->where('status', $status);
    }

    public function whereInventoryAccuracy(InventoryAccuracy $accuracy): PropertySpaceEQB
    {
        return $this->where('inventoryDetails.accuracy', $accuracy);
    }

    public function whereHourlySpace(): PropertySpaceEQB
    {
        return $this->whereInventoryAccuracy(InventoryAccuracy::HOURLY);
    }

    public function whereDailySpace(): PropertySpaceEQB
    {
        return $this->whereInventoryAccuracy(InventoryAccuracy::DAILY);
    }
}
