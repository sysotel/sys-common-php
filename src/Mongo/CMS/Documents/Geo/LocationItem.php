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

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return LocationItem
     */
    public function setSlug(string $slug): LocationItem
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return LocationItem
     */
    public function setName(string $name): LocationItem
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return GeoPoint
     */
    public function getGeoPoint(): GeoPoint
    {
        return $this->geoPoint;
    }

    /**
     * @param GeoPoint $geoPoint
     * @return LocationItem
     */
    public function setGeoPoint(GeoPoint $geoPoint): LocationItem
    {
        $this->geoPoint = $geoPoint;
        return $this;
    }

    /**
     * @return array
     */
    public function getSearchKeywords(): array
    {
        return $this->searchKeywords;
    }

    /**
     * @param array $searchKeywords
     * @return LocationItem
     */
    public function setSearchKeywords(array $searchKeywords): LocationItem
    {
        $this->searchKeywords = $searchKeywords;
        return $this;
    }

    /**
     * @return PropertyCount
     */
    public function getPropertyCount(): PropertyCount
    {
        return $this->propertyCount;
    }

    /**
     * @param PropertyCount $propertyCount
     * @return LocationItem
     */
    public function setPropertyCount(PropertyCount $propertyCount): LocationItem
    {
        $this->propertyCount = $propertyCount;
        return $this;
    }
}
