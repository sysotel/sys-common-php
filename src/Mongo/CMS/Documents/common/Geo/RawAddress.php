<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\OTA\Common\DB\MongoODM\Documents\common\AddressContract;

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
    public $fullAddress;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $line1;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $area;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $city;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $state;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $country;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $postalCode;

    /**
     * @var float
     * @ODM\Field(type="double")
     */
    public $longitude;

    /**
     * @var float
     * @ODM\Field(type="double")
     */
    public $latitude;

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
