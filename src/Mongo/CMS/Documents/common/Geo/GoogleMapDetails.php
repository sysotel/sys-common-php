<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class GoogleMapDetails extends EmbeddedDocument
{
    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $placeId;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $addr1;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $city;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $province;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $country;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $postalCode;

    /**
     * @var ?float
     * @ODM\Field(type="float")
     */
    protected $longitude;

    /**
     * @var ?float
     * @ODM\Field(type="float")
     */
    protected $latitude;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $phone;

    /**
     * @return string|null
     */
    public function getPlaceId(): ?string
    {
        return $this->placeId;
    }

    /**
     * @param string|null $placeId
     * @return GoogleMapDetails
     */
    public function setPlaceId(?string $placeId): GoogleMapDetails
    {
        $this->placeId = $placeId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getAddr1(): ?string
    {
        return $this->addr1;
    }

    /**
     * @param string|null $addr1
     */
    public function setAddr1(?string $addr1): void
    {
        $this->addr1 = $addr1;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getProvince(): ?string
    {
        return $this->province;
    }

    /**
     * @param string|null $province
     */
    public function setProvince(?string $province): void
    {
        $this->province = $province;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

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
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     */
    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     */
    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }



    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return GoogleMapDetails
     */
    public function setPhone(?string $phone): GoogleMapDetails
    {
        $this->phone = $phone;
        return $this;
    }
}
