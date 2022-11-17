<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyNearbyPlace;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\NearbyPlaceCategory;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint;

/**
 * @ODM\EmbeddedDocument
 */


class NearbyPlaceItem extends EmbeddedDocument
{
    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $name;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $description;

    /**
     * @var ?float
     * @ODM\field(type="float")
     */
    protected $distanceFromPropertyInKm;


    /**
     * @var ?NearbyPlaceCategory
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\NearbyPlaceCategory::class)
     */
    protected $category;


    /**
     * @var ?GeoPoint
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint::class)
     */
    private $geoPoint;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
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
     * @return float|null
     */
    public function getDistanceFromPropertyInKm(): ?float
    {
        return $this->distanceFromPropertyInKm;
    }

    /**
     * @param float|null $distanceFromPropertyInKm
     */
    public function setDistanceFromPropertyInKm(?float $distanceFromPropertyInKm): void
    {
        $this->distanceFromPropertyInKm = $distanceFromPropertyInKm;
    }

    /**
     * @return NearbyPlaceCategory|null
     */
    public function getCategory(): ?NearbyPlaceCategory
    {
        return $this->category;
    }

    /**
     * @param NearbyPlaceCategory|null $category
     */
    public function setCategory(?NearbyPlaceCategory $category): void
    {
        $this->category = $category;
    }

    /**
     * @return GeoPoint|null
     */
    public function getGeoPoint(): ?GeoPoint
    {
        return $this->geoPoint;
    }

    /**
     * @param GeoPoint|null $geoPoint
     */
    public function setGeoPoint(?GeoPoint $geoPoint): void
    {
        $this->geoPoint = $geoPoint;
    }
}
