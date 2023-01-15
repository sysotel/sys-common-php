<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Location;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference;

/**
 * @ODM\Document
 */
class City extends Location {
    /**
     * @var ?LocationReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $country;

    /**
     * @var ?LocationReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $state;

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

    /**
     * @return LocationReference|null
     */
    public function getState(): ?LocationReference
    {
        return $this->state;
    }

    /**
     * @param LocationReference|null $state
     */
    public function setState(?LocationReference $state): void
    {
        $this->state = $state;
    }
}
