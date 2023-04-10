<?php

namespace SYSOTEL\APP\Common\DB\EloquentQueryBuilders;

use Jenssegers\Mongodb\Eloquent\Builder;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;

class PropertyCancellationPolicyEQB extends Builder
{
    public function wherePropertyId(int|Property $property): PropertyCancellationPolicyEQB
    {
        $propertyId = $property instanceof Property
            ? $property->id
            : $property;

        return $this->where('propertyId', $propertyId);
    }

    public function whereStatus(CancellationPolicyStatus $status): PropertyCancellationPolicyEQB
    {
        return $this->where('status', $status);
    }

}
