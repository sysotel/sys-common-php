<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Location;

/**
 * @ODM\Document
 */
class Country extends Location
{
    public function getType(): LocationType
    {
        return LocationType::COUNTRY;
    }
}
