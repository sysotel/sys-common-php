<?php

namespace SYSOTEL\APP\Common\DB\ArrayGenerators;

use SYSOTEL\APP\Common\DB\Models\PropertyAmenity\embedded\PropertyAmenityItem;

class AnemitiesDataGenerator extends ArrayDataGenerator
{
    /**
     * @var PropertyAmenityItem
    */
    protected PropertyAmenityItem $amenities;

    /**
     * @param PropertyAmenityItem $amenities
     */
    protected function __construct(PropertyAmenityItem $amenities)
    {
        $this->amenities = $amenities;
    }

    public static function create(PropertyAmenityItem $amenities): static
    {
        return new static($amenities);
    }

}
