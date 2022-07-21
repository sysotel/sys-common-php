<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Delta4op\MongoODM\Documents\Document;
use Delta4op\MongoODM\Facades\DocumentManager;
use Delta4op\MongoODM\Traits\CanResolveIntegerID;
use Delta4op\MongoODM\Traits\HasDefaultAttributes;
use Delta4op\MongoODM\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertySpaceRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAutoIncrementId;

/**
 * @ODM\Document(
 *     collection="cms_propertySpaces",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertySpaceRepository::class
 * ),
 * @ODM\HasLifecycleCallbacks
 */
class PropertySpace extends Document
{
    use HasAutoIncrementId;
    use CanResolveIntegerID;
    use HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $propertyId;

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
    public $description;

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
    ];

    /**
     * @return PropertySpaceRepository
     */
    public static function repository(): PropertySpaceRepository
    {
        return DocumentManager::getRepository(self::class);
    }
}
