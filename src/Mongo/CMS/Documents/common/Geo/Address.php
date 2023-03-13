<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Contracts\AddressContract;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class Address extends EmbeddedDocument implements AddressContract
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    private $fullAddress;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    private $line1;

    /**
     * @var LocationReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $area;

    /**
     * @var LocationReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $city;

    /**
     * @var LocationReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $state;

    /**
     * @var LocationReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $country;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    private $postalCode;

    /**
     * @var ?GoogleMapDetails
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GoogleMapDetails::class)
     */
    private $googleMapDetails;

    /**
     * @var GeoPoint
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint::class)
     */
    private $geoPoint;

    /**
     * @ODM\PrePersist
     */
    public function prePersist()
    {
        if(!$this->fullAddress) {
            $this->fullAddress = $this->generateFullAddress();
        }
    }

    /**
     * @return string
     */
    public function generateFullAddress(): string
    {
        return $this->fullAddress = "{$this->line1}, {$this->area->getName()}, {$this->city->getName()}, {$this->state->getName()}, {$this->country->getName()} - {$this->postalCode}";
    }


    public function getAddressLine(): ?string
    {
        return $this->line1 ?? null;
    }

    public function getAreaName(): ?string
    {
        return $this->area->getName() ?? null;
    }

    public function getCityName(): ?string
    {
        return $this->city->getName() ?? null;
    }

    public function getStateName(): ?string
    {
        return $this->state->getName() ?? null;
    }

    public function getCountryName(): ?string
    {
        return $this->country->getName() ?? null;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode ?? null;
    }

    /**
     * @return string
     */
    public function areaCityString(): string
    {
        return "{$this->area->getName()}, {$this->city->getName()}";
    }

    /**
     * @return string
     */
    public function cityStateString(): string
    {
        return "{$this->city->getName()}, {$this->state->getName()}";
    }

    /**
     * @return string
     */
    public function cityStateCountryString(): string
    {
        return "{$this->cityStateString()}, {$this->country->getName()}";
    }

    /**
     * @return string
     */
    public function getFullAddress(): string
    {
        return $this->fullAddress;
    }

    /**
     * @param string $fullAddress
     * @return Address
     */
    public function setFullAddress(string $fullAddress): Address
    {
        $this->fullAddress = $fullAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine1(): string
    {
        return $this->line1;
    }

    /**
     * @param string $line1
     * @return Address
     */
    public function setLine1(string $line1): Address
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * @return LocationReference
     */
    public function getArea(): LocationReference
    {
        return $this->area;
    }

    /**
     * @param LocationReference $area
     * @return Address
     */
    public function setArea(LocationReference $area): Address
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return LocationReference
     */
    public function getCity(): LocationReference
    {
        return $this->city;
    }

    /**
     * @param LocationReference $city
     * @return Address
     */
    public function setCity(LocationReference $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return LocationReference
     */
    public function getState(): LocationReference
    {
        return $this->state;
    }

    /**
     * @param LocationReference $state
     * @return Address
     */
    public function setState(LocationReference $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return LocationReference
     */
    public function getCountry(): LocationReference
    {
        return $this->country;
    }

    /**
     * @param LocationReference $country
     * @return Address
     */
    public function setCountry(LocationReference $country): Address
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param string $postalCode
     * @return Address
     */
    public function setPostalCode(string $postalCode): Address
    {
        $this->postalCode = $postalCode;
        return $this;
    }


    /**
     * @return ?GeoPoint
     */
    public function getGeoPoint(): ?GeoPoint
    {
        return $this->geoPoint;
    }

    /**
     * @param ?GeoPoint $geoPoint
     * @return Address
     */
    public function setGeoPoint(?GeoPoint $geoPoint): Address
    {
        $this->geoPoint = $geoPoint;
        return $this;
    }

    /**
     * @return GoogleMapDetails|null
     */
    public function getGoogleMapDetails(): ?GoogleMapDetails
    {
        return $this->googleMapDetails;
    }

    /**
     * @param GoogleMapDetails|null $googleMapDetails
     * @return Address
     */
    public function setGoogleMapDetails(?GoogleMapDetails $googleMapDetails): Address
    {
        $this->googleMapDetails = $googleMapDetails;
        return $this;
    }
}
