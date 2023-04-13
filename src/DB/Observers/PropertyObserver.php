<?php

namespace SYSOTEL\APP\Common\DB\Observers;

use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Helpers\PropertySlugGenerator;
use SYSOTEL\APP\Common\DB\Models\Property\Property;

class PropertyObserver
{
    /**
     * @param Property $property
     * @return void
     */
    public function creating(Property $property): void
    {

        $property->_id = NumericIdGenerator::get($property);

        $slugGenerator = new PropertySlugGenerator($property);

        if(!$property->accountSlug) {
            $property->accountSlug = $slugGenerator->generateAccountSlug();
        }

        if(!$property->slug) {
            $property->slug = $slugGenerator->generateSlug();
        }

    }
}
