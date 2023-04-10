<?php

namespace SYSOTEL\APP\Common\DB\EloquentQueryBuilders;

use Jenssegers\Mongodb\Eloquent\Builder;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;

class PropertyImageEQB extends Builder
{
    public function wherePropertyId(int|Property $property): PropertyImageEQB
    {
        $propertyId = $property instanceof Property
            ? $property->id
            : $property;

        return $this->where('propertyId', $propertyId);
    }

    public function whereTarget(PropertyImageTarget $target): PropertyImageEQB
    {
        return $this->where('target', $target);
    }

    public function whereStatus(PropertyImageStatus $status): PropertyImageEQB
    {
        return $this->where('status', $status);
    }


}
