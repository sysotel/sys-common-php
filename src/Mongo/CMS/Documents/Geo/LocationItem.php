<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\PropertyCount;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;

/**
 * @ODM\MappedSuperclass
 */
abstract class LocationItem extends BaseDocument
{
    use HasObjectIdKey;

    /**
     * @var string
     * @ODM\Field
     */
    protected $slug;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var GeoPoint
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\GeoLocation::class)
     */
    protected $geoPoint;

    /**
     * @var array
     * @ODM\Field(type="collection")
     */
    protected $searchKeywords = [];

    /**
     * @var PropertyCount
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\PropertyCount::class)
     */
    protected $propertyCount;
}
