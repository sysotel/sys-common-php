<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Enums\CMS\AgeCode;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity\PropertyAmenityItem;

class AnemitiesDataGenerator
{
    use Helpers;

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


}
