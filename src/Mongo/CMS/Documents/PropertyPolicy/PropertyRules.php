<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\PropertyAmenity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class PropertyRules extends EmbeddedDocument
{
    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $localIdAllowed;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $documentsRequiredOnCheckIn;

    /**
     * @var string[]
     * @ODM\Field(type="collection")
     */
    public $acceptedIdentityProofs;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $unmarriedCoupleAllowed;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $bachelorsAllowed;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $guestBelow18Allowed;
}
