<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasProductId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasSpaceId;

/**
 * @ODM\Document(
 *     collection="propertyImages",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyImageRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class PropertyImage extends BaseDocument
{
    use HasAccountId, HasProductId, HasSpaceId, HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var string
     * @ODM\Id
     */
    public $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $supplierID;

    /**
     * @var PropertyImageTarget
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget::class)
     */
    public $target;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $title;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $description;

    /**
     * @var ImageMetadata
     * @ODM\EmbedOne (targetDocument=ImageMetadata::class)
     */
    public $metadata;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $sortOrder;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $targetSortOrder;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $isFeatured;

    /**
     * @var PropertyImageStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus::class)
     */
    public $status;

    /**
     * @var UserReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference::class)
     */
    public $uploadedBy;

    /**
     * @var Carbon
     * @ODM\Field(type="carbon")
     */
    public $deletedAt;

    /**
     * @return $this
     */
    public function markAsDeleted(): static
    {
        $this->status = PropertyImageStatus::DELETED;
        $this->deletedAt = now();
        return $this;
    }
}
