<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Amenity;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Delta4op\Mongodb\Traits\CanResolveStringID;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTemplateType;

/**
 * @ODM\EmbeddedDocument
 */
class TemplateAttribute extends EmbeddedDocument
{
    use HasTimestamps;
    use CanResolveStringID;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $description;
}
