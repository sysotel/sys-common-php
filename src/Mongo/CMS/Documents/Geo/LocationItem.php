<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Delta4op\Mongodb\Documents\Document;
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
    public $slug;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @var GeoPoint
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\GeoLocation::class)
     */
    public $geoPoint;

    /**
     * @var array
     * @ODM\Field(type="collection")
     */
    public $searchKeywords;

    /**
     * @var PropertyCount
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\PropertyCount::class)
     */
    public $propertyCount;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $status;
    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_INACTIVE = 'INACTIVE';

    public function __construct(array $attributes = [])
    {
        $this->searchKeywords = [];

        parent::__construct($attributes);
    }
}
