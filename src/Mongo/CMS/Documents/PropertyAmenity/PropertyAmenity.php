<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasSpaceId;

/**
 * @ODM\Document(collection="propertyAmenities")
 */
class PropertyAmenity extends BaseDocument
{
    use HasObjectIdKey, HasAccountId, HasPropertyId, HasSpaceId, HasTimestamps;

    /**
     * @var Collection & PropertyAmenityItem[]
     * @ODM\EmbedMany (targetDocument=PropertyAmenityItem::class)
     */
    protected $amenities;

    public function __construct()
    {
        $this->amenities = new ArrayCollection;
    }

    /**
     * @return ArrayCollection|Collection|PropertyAmenityItem[]
     */
    public function getAmenities(): array|ArrayCollection|Collection
    {
        return $this->amenities;
    }

    /**
     * @param ArrayCollection|Collection|PropertyAmenityItem[] $amenities
     */
    public function setAmenities(array|ArrayCollection|Collection $amenities): void
    {
        $this->amenities = $amenities;
    }

    public function addAmenity(PropertyAmenityItem $val): static
    {
        $this->amenities->add($val);
        return $this;
    }

    public function getAmenityItem(string $id)
    {
        foreach($this->amenities as $amenityItem) {
            if($amenityItem->getId() === $id) {
                 return $amenityItem;
            }
        }

        return null;
    }
}
