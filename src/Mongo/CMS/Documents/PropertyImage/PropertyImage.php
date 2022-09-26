<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage;

use Carbon\Carbon;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageVersion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Verification;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;
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
    use HasAccountId, HasPropertyId, HasSpaceId, HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var string
     * @ODM\Id
     */
    public $id;
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
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $isFeatured;

    /**
     * @var ArrayCollection & ImageItem[]
     * @ODM\EmbedMany (targetDocument=ImageItem::class)
     */
    public $items;

    /**
     * @var Verification
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Verification::class)
     */
    public $verification;

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

    protected $defaults = [
        'isFeatured' => false,
        'sortOrder' => 0,
        'targetSortOrder' => 0,
    ];

    /**
     * @return $this
     */
    public function markAsDeleted(): static
    {
        $this->status = PropertyImageStatus::DELETED;
        $this->deletedAt = now();
        return $this;
    }

    public function __construct(array $attributes = [])
    {
        $this->items = new ArrayCollection;

        parent::__construct($attributes);
    }

    /**
     * @param PropertyImageVersion $version
     * @return string|null
     */
    public function url(PropertyImageVersion $version): string|null
    {
        $imageItem = $this->imageItem($version);

        return $imageItem->url ?? null;
    }

    /**
     * @param PropertyImageVersion $version
     * @return ImageItem|null
     */
    public function imageItem(PropertyImageVersion $version): ?ImageItem
    {
        foreach($this->items as $imageItem) {
            if($imageItem->version === $version) {
                return $imageItem;
            }
        }

        return null;
    }
}
