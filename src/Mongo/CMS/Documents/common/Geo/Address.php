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
    public $fullAddress;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $line1;

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

    /**
     * @ODM\PrePersist
     */
    protected function prePersist()
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
        return $this->fullAddress = "{$this->line1}, {$this->area->name}, {$this->city->name}, {$this->state->name}, {$this->postalCode}";
    }


    public function getAddressLine(): ?string
    {
        return $this->line1 ?? null;
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
