<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
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
    public $displayName;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $internalName;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    public $shortDescription;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    public $longDescription;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    public $noOfUnits;

    /**
     * @var SpaceOccupancy
     * @ODM\EmbedOne (targetDocument=SpaceOccupancy::class)
     */
    public $occupancy;

    /**
     * @var SpaceView
     * @ODM\EmbedOne(targetDocument=SpaceView::class)
     */
    public $view;

    /**
     * @var SpaceSize
     * @ODM\EmbedOne(targetDocument=SpaceSize::class)
     */
    public $size;

    /**
     * @var ?bool
     * @ODM\Field(type="bool")
     */
    public $nonSmoking;

    /**
     * @var InventorySettings
     * @ODM\EmbedOne(targetDocument=InventorySettings::class)
     */
    public $inventorySettings;

    /**
     * @var SpaceStayType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\SpaceStayType::class)
     */
    public $stayType;

    /**
     * @var PropertySpaceStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus::class)
     */
    public $status;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $sortOrder;

    /**
     * @var array
     */
    public $defaults = [
        'status' => PropertySpaceStatus::ACTIVE,
        'stayType' => SpaceStayType::PRIVATE
    ];
}
