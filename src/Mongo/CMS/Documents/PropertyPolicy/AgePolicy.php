<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\PropertyAmenity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class AgePolicy extends EmbeddedDocument
{
    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $infantAgeThreshold;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $childAgeTopThreshold;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $freeChildThreshold;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $noOfFreeChildGranted;
}
