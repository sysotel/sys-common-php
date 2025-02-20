<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Location;

/**
 * @ODM\EmbeddedDocument
 */
class LocationReference extends EmbeddedDocument
{
    /**
     * @var ?string
     * @ODM\Field(type="object_id")
     */
    protected $id;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $categorySlug;

    /**
     * @var ?LocationType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\LocationType::class)
     */
    protected $type;

    /**
     * @param Location $location
     * @return static
     */
    public static function createFromLocation(Location $location): static
    {
        $instance = new self;
        $instance->id = $location->getId();
        $instance->name = $location->getName();
        $instance->slug = $location->getCategorySlug();
        $instance->type = $location->getType();
        return $instance;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
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
     * @return LocationReference
     */
    public function setName(?string $name): LocationReference
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategorySlug(): ?string
    {
        return $this->categorySlug;
    }

    /**
     * @param string|null $categorySlug
     * @return LocationReference
     */
    public function setCategorySlug(?string $categorySlug): LocationReference
    {
        $this->categorySlug = $categorySlug;
        return $this;
    }

    /**
     * @return LocationType|null
     */
    public function getType(): ?LocationType
    {
        return $this->type;
    }

    /**
     * @param LocationType|null $type
     */
    public function setType(?LocationType $type): void
    {
        $this->type = $type;
    }
}
