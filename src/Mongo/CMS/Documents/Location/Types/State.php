<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Location;

/**
 * @ODM\Document
 */
class State extends Location
{
    /**
     * @var ?LocationReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $country;

    /**
     * @return LocationReference|null
     */
    public function getCountry(): ?LocationReference
    {
        return $this->country;
    }

    /**
     * @param LocationReference|null $country
     */
    public function setCountry(?LocationReference $country): void
    {
        $this->country = $country;
    }

    public function getType(): LocationType
    {
        return LocationType::STATE;
    }
}
