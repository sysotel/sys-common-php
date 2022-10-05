<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Contracts\AddressContract;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class RawAddress extends EmbeddedDocument implements AddressContract
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
     * @var string
     * @ODM\Field(type="string")
     */
    protected $area;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $city;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $state;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $country;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $postalCode;

    /**
     * @var float
     * @ODM\Field(type="double")
     */
    protected $longitude;

    /**
     * @var float
     * @ODM\Field(type="double")
     */
    protected $latitude;

    /**
     * @param string $fullAddress
     * @return RawAddress
     */
    public function setFullAddress(string $fullAddress): RawAddress
    {
        $this->fullAddress = $fullAddress;
        return $this;
    }

    /**
     * @param string $line1
     * @return RawAddress
     */
    public function setLine1(string $line1): RawAddress
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * @param string $area
     * @return RawAddress
     */
    public function setArea(string $area): RawAddress
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @param string $city
     * @return RawAddress
     */
    public function setCity(string $city): RawAddress
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param string $state
     * @return RawAddress
     */
    public function setState(string $state): RawAddress
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param string $country
     * @return RawAddress
     */
    public function setCountry(string $country): RawAddress
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param int $postalCode
     * @return RawAddress
     */
    public function setPostalCode(int $postalCode): RawAddress
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @param float $longitude
     * @return RawAddress
     */
    public function setLongitude(float $longitude): RawAddress
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @param float $latitude
     * @return RawAddress
     */
    public function setLatitude(float $latitude): RawAddress
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getPostalCode(): string|null
    {
        return $this->postalCode;
    }

    public function getAddressLine(): string|null
    {
        return $this->addressLine;
    }

    public function getAreaName(): string|null
    {
        return $this->area;
    }

    public function getCityName(): string|null
    {
        return $this->city;
    }

    public function getStateName(): string|null
    {
        return $this->state;
    }

    public function getCountryName(): string|null
    {
        return $this->country;
    }
}
