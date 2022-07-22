<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class RawAddress extends EmbeddedDocument
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
}
