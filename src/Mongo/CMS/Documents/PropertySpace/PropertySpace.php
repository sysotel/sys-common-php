<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceCategory;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertySpaceRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAutoIncrementId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\Document(
 *     collection="propertySpaces",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertySpaceRepository::class
 * ),
 * @ODM\HasLifecycleCallbacks
 */
class PropertySpace extends BaseDocument
{
    use HasAccountId;
    use HasPropertyId;
    use HasAutoIncrementId;
    use CanResolveIntegerID;
    use HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $displayName;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $internalName;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    protected $shortDescription;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    protected $longDescription;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $noOfUnits;

    /**
     * @var SpaceOccupancy
     * @ODM\EmbedOne (targetDocument=SpaceOccupancy::class)
     */
    protected $occupancy;

    /**
     * @var ?SpaceView
     * @ODM\EmbedOne(targetDocument=SpaceView::class)
     */
    protected $view;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $rackRate;

    /**
     * @var ?SpaceCategory
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\SpaceCategory::class)
     */
    protected $spaceCategory;
    /**
     * @var ?SpaceSize
     * @ODM\EmbedOne(targetDocument=SpaceSize::class)
     */
    protected $size;

    /**
     * @var ?bool
     * @ODM\Field(type="bool")
     */
    protected $nonSmoking;

    /**
     * @var InventorySettings
     * @ODM\EmbedOne(targetDocument=InventorySettings::class)
     */
    protected $inventorySettings;

    /**
     * @var SpaceStayType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\SpaceStayType::class)
     */
    protected $stayType;

    /**
     * @var PropertySpaceStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus::class)
     */
    protected $status;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $sortOrder;

    /**
     * @var array
     */
    protected $defaults = [
        'status' => PropertySpaceStatus::ACTIVE,
        'stayType' => SpaceStayType::PRIVATE,
        'sortOrder' => 0,
    ];

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     * @return PropertySpace
     */
    public function setDisplayName(string $displayName): PropertySpace
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalName(): string
    {
        return $this->internalName;
    }

    /**
     * @param string $internalName
     * @return PropertySpace
     */
    public function setInternalName(string $internalName): PropertySpace
    {
        $this->internalName = $internalName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param string|null $shortDescription
     * @return PropertySpace
     */
    public function setShortDescription(?string $shortDescription): PropertySpace
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    /**
     * @param string|null $longDescription
     * @return PropertySpace
     */
    public function setLongDescription(?string $longDescription): PropertySpace
    {
        $this->longDescription = $longDescription;
        return $this;
    }

    /**
     * @return int
     */
    public function getNoOfUnits(): int
    {
        return $this->noOfUnits;
    }

    /**
     * @param int $noOfUnits
     * @return PropertySpace
     */
    public function setNoOfUnits(int $noOfUnits): PropertySpace
    {
        $this->noOfUnits = $noOfUnits;
        return $this;
    }

    /**
     * @return SpaceOccupancy
     */
    public function getOccupancy(): SpaceOccupancy
    {
        return $this->occupancy;
    }

    /**
     * @param SpaceOccupancy $occupancy
     * @return PropertySpace
     */
    public function setOccupancy(SpaceOccupancy $occupancy): PropertySpace
    {
        $this->occupancy = $occupancy;
        return $this;
    }

    /**
     * @return SpaceView|null
     */
    public function getView(): ?SpaceView
    {
        return $this->view;
    }

    /**
     * @param SpaceView|null $view
     * @return PropertySpace
     */
    public function setView(?SpaceView $view): PropertySpace
    {
        $this->view = $view;
        return $this;
    }

    /**
     * @return SpaceSize|null
     */
    public function getSize(): ?SpaceSize
    {
        return $this->size;
    }

    /**
     * @param SpaceSize|null $size
     * @return PropertySpace
     */
    public function setSize(?SpaceSize $size): PropertySpace
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNonSmoking(): ?bool
    {
        return $this->nonSmoking;
    }

    /**
     * @param bool|null $nonSmoking
     * @return PropertySpace
     */
    public function setNonSmoking(?bool $nonSmoking): PropertySpace
    {
        $this->nonSmoking = $nonSmoking;
        return $this;
    }

    /**
     * @return InventorySettings
     */
    public function getInventorySettings(): InventorySettings
    {
        return $this->inventorySettings;
    }

    /**
     * @param InventorySettings $inventorySettings
     * @return PropertySpace
     */
    public function setInventorySettings(InventorySettings $inventorySettings): PropertySpace
    {
        $this->inventorySettings = $inventorySettings;
        return $this;
    }

    /**
     * @return SpaceStayType
     */
    public function getStayType(): SpaceStayType
    {
        return $this->stayType;
    }

    /**
     * @param SpaceStayType $stayType
     * @return PropertySpace
     */
    public function setStayType(SpaceStayType $stayType): PropertySpace
    {
        $this->stayType = $stayType;
        return $this;
    }

    /**
     * @return PropertySpaceStatus
     */
    public function getStatus(): PropertySpaceStatus
    {
        return $this->status;
    }

    /**
     * @param PropertySpaceStatus $status
     * @return PropertySpace
     */
    public function setStatus(PropertySpaceStatus $status): PropertySpace
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    /**
     * @param int|null $sortOrder
     * @return PropertySpace
     */
    public function setSortOrder(?int $sortOrder): PropertySpace
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRackRate(): ?int
    {
        return $this->rackRate;
    }

    /**
     * @param int|null $rackRate
     */
    public function setRackRate(?int $rackRate): void
    {
        $this->rackRate = $rackRate;
    }

    /**
     * @return SpaceCategory|null
     */
    public function getSpaceCategory(): ?SpaceCategory
    {
        return $this->spaceCategory;
    }

    /**
     * @param SpaceCategory|null $spaceCategory
     */
    public function setSpaceCategory(?SpaceCategory $spaceCategory): void
    {
        $this->spaceCategory = $spaceCategory;
    }


    /**
     * @return PropertySpaceRepository
     */
    public static function repository(): PropertySpaceRepository
    {
        return parent::repository();
    }
}
