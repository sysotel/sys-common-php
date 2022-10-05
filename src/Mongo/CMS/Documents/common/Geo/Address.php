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
    protected $fullAddress;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $line1;

    /**
     * @var AreaReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\AreaReference::class)
     */
    protected $area;

    /**
     * @var CityReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CityReference::class)
     */
    protected $city;

    /**
     * @var StateReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference::class)
     */
    protected $state;

    /**
     * @var CountryReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference::class)
     */
    protected $country;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $postalCode;

    /**
     * @var GeoPoint
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint::class)
     */
    protected $geoPoint;

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
     * @param float $longitude
     * @param float $latitude
     * @return $this
     */
    public function setGeoPoint(float $longitude, float $latitude): static
    {
        $this->geoPoint = GeoPoint::createFromCoordinates($longitude, $latitude);

        return $this;
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
     * @return AreaReference
     */
    public function getArea(): AreaReference
    {
        return $this->area;
    }

    /**
     * @param AreaReference $area
     * @return Address
     */
    public function setArea(AreaReference $area): Address
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return CityReference
     */
    public function getCity(): CityReference
    {
        return $this->city;
    }

    /**
     * @param CityReference $city
     * @return Address
     */
    public function setCity(CityReference $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return StateReference
     */
    public function getState(): StateReference
    {
        return $this->state;
    }

    /**
     * @param StateReference $state
     * @return Address
     */
    public function setState(StateReference $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return CountryReference
     */
    public function getCountry(): CountryReference
    {
        return $this->country;
    }

    /**
     * @param CountryReference $country
     * @return Address
     */
    public function setCountry(CountryReference $country): Address
    {
        $this->country = $country;
        return $this;
    }
}
