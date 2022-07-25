<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\AreaReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CityReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\AddressContract;

/**
 * @ODM\EmbeddedDocument
 */
class Address extends EmbeddedDocument implements AddressContract
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $fullAddress;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $addressLine;

    /**
     * @var AreaReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\AreaReference::class)
     */
    public $area;

    /**
     * @var CityReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CityReference::class)
     */
    public $city;

    /**
     * @var StateReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference::class)
     */
    public $state;

    /**
     * @var CountryReference
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference::class)
     */
    public $country;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $postalCode;

    /**
     * @var GeoPoint
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint::class)
     */
    public $geoPoint;


    public function getAddressLine(): ?string
    {
        return $this->addressLine ?? null;
    }

    public function getAreaName(): ?string
    {
        return $this->area->name ?? null;
    }

    public function getCityName(): ?string
    {
        return $this->city->name ?? null;
    }

    public function getStateName(): ?string
    {
        return $this->state->name ?? null;
    }

    public function getCountryName(): ?string
    {
        return $this->country->name ?? null;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode ?? null;
    }
}
