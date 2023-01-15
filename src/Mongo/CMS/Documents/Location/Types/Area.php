<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Location;

/**
 * @ODM\Document
 */
class Area extends Location {

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $postalCode;

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
     * @var ?LocationReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $city;

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     */
    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

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

    /**
     * @return LocationReference|null
     */
    public function getCity(): ?LocationReference
    {
        return $this->city;
    }

    /**
     * @param LocationReference|null $city
     */
    public function setCity(?LocationReference $city): void
    {
        $this->city = $city;
    }

    public function getType(): LocationType
    {
        return LocationType::AREA;
    }
}
