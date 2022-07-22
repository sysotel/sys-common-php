<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\Country;

/**
 * @ODM\EmbeddedDocument
 */
class CountryReference extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @param Country $country
     * @return CountryReference
     */
    public static function createFromCountry(Country $country): CountryReference
    {
        return new self([
            'id' => $country->id,
            'name' => $country->name,
        ]);
    }
}
