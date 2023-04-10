<?php

namespace SYSOTEL\APP\Common\DB\EloquentQueryBuilders;

use Jenssegers\Mongodb\Eloquent\Builder;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\Enums\CMS\InventoryAccuracy;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PropertyProductEQB extends Builder
{
    public function wherePropertyId(int|Property $property): PropertyProductEQB
    {
        $propertyId = $property instanceof Property
            ? $property->id
            : $property;

        return $this->where('propertyId', $propertyId);
    }

    public function whereStatus(PropertyProductStatus $status): PropertyProductEQB
    {
        return $this->where('status', $status);
    }

    public function whereSpaceId(int|PropertySpace $space): PropertyProductEQB
    {
        $spaceId = $space instanceof PropertySpace
            ? $space->id
            : $space;

        return $this->where('spaceId', $spaceId);

    }
}
