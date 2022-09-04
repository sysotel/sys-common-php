<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\PropertyAmenity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class PropertyAmenityItem extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\field(type="string")
     */
    public $id;

    /**
     * @var bool
     * @ODM\field(type="bool")
     */
    public $flag;

    /**
     * @var string
     * @ODM\field(type="string")
     */
    public $note;
}
