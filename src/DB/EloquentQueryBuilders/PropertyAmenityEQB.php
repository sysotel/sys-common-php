<?php

namespace SYSOTEL\APP\Common\DB\EloquentQueryBuilders;

use Jenssegers\Mongodb\Eloquent\Builder;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;

class PropertyAmenityEQB extends Builder
{
    public function wherePropertyId(int|Property $property): PropertyAmenityEQB
    {
        $propertyId = $property instanceof Property
            ? $property->id
            : $property;

        return $this->where('propertyId', $propertyId);
    }

    public function whereTarget(AmenityTarget $target): PropertyAmenityEQB
    {
        return $this->where('target', $target);
    }

}
