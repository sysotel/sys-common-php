<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyNearbyPlace;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\NearbyPlaceCategory;
use SYSOTEL\APP\Common\Enums\CMS\PropertyType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\Address;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class NearbyPlaces extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\field(type="string")
     */
    protected $name;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $description;

    /**
     * @var int|float
     * @ODM\field(type="int|float")
     */
    protected $distanceFromPropertyInKm;


    /**
     * @var NearbyPlaceCategory
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\NearbyPlaceCategory::class)
     */
    protected $category;


    /**
     * @var GeoPoint
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint::class)
     */
    private $geoPoint;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float|int
     */
    public function getDistanceFromPropertyInKm(): float|int
    {
        return $this->distanceFromPropertyInKm;
    }

    /**
     * @param float|int $distanceFromPropertyInKm
     */
    public function setDistanceFromPropertyInKm(float|int $distanceFromPropertyInKm): void
    {
        $this->distanceFromPropertyInKm = $distanceFromPropertyInKm;
    }

    /**
     * @return NearbyPlaceCategory
     */
    public function getCategory(): NearbyPlaceCategory
    {
        return $this->category;
    }

    /**
     * @param NearbyPlaceCategory $category
     */
    public function setCategory(NearbyPlaceCategory $category): void
    {
        $this->category = $category;
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
     */
    public function setGeoPoint(GeoPoint $geoPoint): void
    {
        $this->geoPoint = $geoPoint;
    }


}
