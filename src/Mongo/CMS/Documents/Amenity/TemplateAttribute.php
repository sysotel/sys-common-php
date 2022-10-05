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
     * @var ?int
     * @ODM\Field(type="int")
     */
    public $id;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    public $description;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return TemplateAttribute
     */
    public function setId(?int $id): TemplateAttribute
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return TemplateAttribute
     */
    public function setName(?string $name): TemplateAttribute
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return TemplateAttribute
     */
    public function setDescription(?string $description): TemplateAttribute
    {
        $this->description = $description;
        return $this;
    }

    
}
