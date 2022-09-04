<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity;

use Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasProductId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasSpaceId;

/**
 * @ODM\Document(collection="propertyAmenities")
 */
class PropertyAmenity extends Document
{
    use HasObjectIdKey, HasPropertyId, HasAccountId, HasProductId, HasSpaceId;
    use HasTimestamps;

    /**
     * @var
     * @ODM\EmbedMany (targetDocument=)
     */
    public $amenities;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->amenities = new ArrayCollection;
    }
}
