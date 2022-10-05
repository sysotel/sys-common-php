<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasSpaceId;
use SYSOTEL\OTA\Common\Mongo\CMS\Documents\PropertyAmenity\PropertyAmenityItem;

/**
 * @ODM\Document(collection="propertyAmenities")
 */
class PropertyAmenity extends BaseDocument
{
    use HasObjectIdKey, HasAccountId, HasPropertyId, HasSpaceId, HasTimestamps;

    /**
     * @var PropertyAmenityItem[] & ArrayCollection
     * @ODM\EmbedMany (targetDocument=PropertyAmenityItem::class)
     */
    public $amenities;

    public function __construct()
    {
        $this->amenities = new ArrayCollection;
    }
}
