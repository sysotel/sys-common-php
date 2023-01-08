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
 * @ODM\Document(collection="amenities")
 */
class Amenity extends BaseDocument
{
    use HasTimestamps;
    use CanResolveStringID;

    /**
     * @var ?string
     * @ODM\Id(strategy="none", type="string"))
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
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $description;

    /**
     * @var ?bool
     * @ODM\Field(type="bool")
     */
    protected $isFeatured;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $featureOrder;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $categoryOrder;

    /**
     * @var AmenityStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityStatus::class)
     */
    protected $status;

    /**
     * @var AmenityDetailsTemplate
     * @ODM\EmbedOne (targetDocument=AmenityDetailsTemplate::class)
     */
    protected $template;

    /**
     * @return AmenityDetailsTemplate
     */
    public function getTemplate(): AmenityDetailsTemplate
    {
        return $this->template;
    }

    /**
     * @param AmenityDetailsTemplate $template
     */
    public function setTemplate(AmenityDetailsTemplate $template): void
    {
        $this->template = $template;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
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
     */
    public function setTarget(AmenityTarget $target): void
    {
        $this->target = $target;
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
     */
    public function setCategory(AmenityCategory $category): void
    {
        $this->category = $category;
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
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return bool|null
     */
    public function isFeatured(): ?bool
    {
        return $this->isFeatured;
    }

    /**
     * @param bool|null $isFeatured
     */
    public function setIsFeatured(?bool $isFeatured): void
    {
        $this->isFeatured = $isFeatured;
    }

    /**
     * @return int|null
     */
    public function getFeatureOrder(): ?int
    {
        return $this->featureOrder;
    }

    /**
     * @param int|null $featureOrder
     */
    public function setFeatureOrder(?int $featureOrder): void
    {
        $this->featureOrder = $featureOrder;
    }

    /**
     * @return int|null
     */
    public function getCategoryOrder(): ?int
    {
        return $this->categoryOrder;
    }

    /**
     * @param int|null $categoryOrder
     */
    public function setCategoryOrder(?int $categoryOrder): void
    {
        $this->categoryOrder = $categoryOrder;
    }
}
