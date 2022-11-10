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
    use HasTimestamps;
    use CanResolveStringID;

    /**
     * @var ?AmenityTemplateType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityTemplateType::class))
     */
    private $type;

    /**
     * @var ArrayCollection & TemplateAttribute[]
     * @ODM\EmbedMany (targetDocument=TemplateAttribute::class)
     */
    private $attributes;

    public function __construct()
    {
        $this->attributes = new ArrayCollection;
    }

    /**
     * @return AmenityTemplateType
     */
    public function getType(): AmenityTemplateType
    {
        return $this->type;
    }

    /**
     * @param AmenityTemplateType $type
     * @return self
     */
    public function setType(AmenityTemplateType $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return ArrayCollection|TemplateAttribute[]
     */
    public function getAttributes(): ArrayCollection|array
    {
        return $this->attributes;
    }

    /**
     * @param ArrayCollection|TemplateAttribute[] $attributes
     * @return self
     */
    public function setAttributes(ArrayCollection|array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }
}
