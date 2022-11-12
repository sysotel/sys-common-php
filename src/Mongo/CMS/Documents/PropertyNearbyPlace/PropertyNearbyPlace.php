<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyNearbyPlace;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\Document(
 *     collection="propertyNearbyPlaces"
 *  )
 * @ODM\HasLifecycleCallbacks
 */
class PropertyNearbyPlace extends BaseDocument
{
    use HasObjectIdKey, HasAccountId, HasPropertyId, HasTimestamps;

    /**
     * @var Collection & NearbyPlaces[]
     * @ODM\EmbedMany (targetDocument=NearbyPlaces::class)
     */
    protected $places;


    public function __construct()
    {
        $this->places = new ArrayCollection;
    }

    /**
     * @return ArrayCollection|Collection|NearbyPlaces[]
     */
    public function getPlaces(): array|ArrayCollection|Collection
    {
        return $this->places;
    }

    /**
     * @param ArrayCollection|Collection|NearbyPlaces[] $places
     */
    public function setPlaces(array|ArrayCollection|Collection $places): void
    {
        $this->places = $places;
    }


}
