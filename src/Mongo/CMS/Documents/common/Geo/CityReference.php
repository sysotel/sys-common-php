<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\City;

/**
 * @ODM\EmbeddedDocument
 */
class CityReference extends EmbeddedDocument
{
    /**
     * @var ObjectId
     * @ODM\Field(type="object_id")
     */
    public $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $slug;

    /**
     * @param City $city
     * @return CityReference
     */
    public static function createFromCity(City $city): CityReference
    {
        return new self([
            'id' => new ObjectId($city->id),
            'name' => $city->name,
            'slug' => $city->slug,
        ]);
    }
}
