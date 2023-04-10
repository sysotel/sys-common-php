<?php

namespace SYSOTEL\APP\Common\DB\EloquentQueryBuilders;

use Jenssegers\Mongodb\Eloquent\Builder;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus;

class PropertyPolicyEQB extends Builder
{
    public function wherePropertyId(int|Property $property): PropertyPolicyEQB
    {
        $propertyId = $property instanceof Property
            ? $property->id
            : $property;

        return $this->where('propertyId', $propertyId);
    }


    public function whereStatus(PropertyPolicyStatus $status): PropertyPolicyEQB
    {
        return $this->where('status', $status);
    }


}
