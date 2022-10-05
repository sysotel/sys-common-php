<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Amenity;

use Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\CanResolveStringID;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\AmenityCategory;
use SYSOTEL\APP\Common\Enums\CMS\AmenityStatus;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;

/**
 * @ODM\Document(collection="emenities")
 */
class Amenity extends BaseDocument
{
    use HasTimestamps;
    use CanResolveStringID;

    /**
     * @var string
     * @ODM\Id(strategy="none", type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityTarget::class))
     */
    protected $id;

    /**
     * @var AmenityTarget
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityTarget::class)
     */
    protected $target;

    /**
     * @var AmenityCategory
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityCategory::class)
     */
    protected $category;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $description;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    protected $isFeatured;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $featureOrder;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $categoryOrder;

    /**
     * @var AmenityStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityCategory::class)
     */
    protected $status;

    /**
     * @var AmenityDetailsTemplate
     * @ODM\EmbedOne (targetClass=AmenityDetailsTemplate::class)
     */
    protected $template;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return AmenityTarget
     */
    public function getTarget(): AmenityTarget
    {
        return $this->target;
    }

    /**
     * @param AmenityTarget $target
     * @return self
     */
    public function setTarget(AmenityTarget $target): self
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @return AmenityCategory
     */
    public function getCategory(): AmenityCategory
    {
        return $this->category;
    }

    /**
     * @param AmenityCategory $category
     * @return self
     */
    public function setCategory(AmenityCategory $category): self
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFeatured(): bool
    {
        return $this->isFeatured;
    }

    /**
     * @param bool $isFeatured
     * @return self
     */
    public function setIsFeatured(bool $isFeatured): self
    {
        $this->isFeatured = $isFeatured;
        return $this;
    }

    /**
     * @return int
     */
    public function getFeatureOrder(): int
    {
        return $this->featureOrder;
    }

    /**
     * @param int $featureOrder
     * @return self
     */
    public function setFeatureOrder(int $featureOrder): self
    {
        $this->featureOrder = $featureOrder;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryOrder(): int
    {
        return $this->categoryOrder;
    }

    /**
     * @param int $categoryOrder
     * @return self
     */
    public function setCategoryOrder(int $categoryOrder): self
    {
        $this->categoryOrder = $categoryOrder;
        return $this;
    }

    /**
     * @return AmenityStatus
     */
    public function getStatus(): AmenityStatus
    {
        return $this->status;
    }

    /**
     * @param AmenityStatus $status
     * @return self
     */
    public function setStatus(AmenityStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return AmenityDetailsTemplate
     */
    public function getTemplate(): AmenityDetailsTemplate
    {
        return $this->template;
    }

    /**
     * @param AmenityDetailsTemplate $template
     * @return self
     */
    public function setTemplate(AmenityDetailsTemplate $template): self
    {
        $this->template = $template;
        return $this;
    }
}
