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
class AmenityDetailsTemplate extends EmbeddedDocument
{
    use CanResolveStringID, HasTimestamps;

    /**
     * @var AmenityTemplateType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityTemplateType::class))
     */
    public $type;

    /**
     * @var ArrayCollection & TemplateAttribute[]
     * @ODM\EmbedMany (targetClass=TemplateAttribute::class)
     */
    public $attributes;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes = new ArrayCollection;
    }
}
