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
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyImageRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasSpaceId;

/**
 * @ODM\Document(
 *     collection="propertyImages",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyImageRepository::class
 * ),
 * @ODM\HasLifecycleCallbacks
 */
class PropertyImage extends BaseDocument
{
    use HasObjectIdKey, HasAccountId, HasPropertyId, HasSpaceId, HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var PropertyImageTarget
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget::class)
     */
    protected $target;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $title;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $description;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    protected $isFeatured;

    /**
     * @var ArrayCollection & ImageItem[]
     * @ODM\EmbedMany  (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\ImageItem::class)
     */
    protected $items;

    /**
     * @var Verification
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Verification::class)
     */
    protected $verification;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $sortOrder;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $targetSortOrder;

    /**
     * @var PropertyImageStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus::class)
     */
    protected $status;

    /**
     * @var UserReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference::class)
     */
    protected $uploadedBy;

    /**
     * @var ?Carbon
     * @ODM\Field(type="carbon")
     */
    protected $deletedAt;

    protected $defaults = [
        'isFeatured' => false,
        'sortOrder' => 0,
        'targetSortOrder' => 0,
        'status' => PropertyImageStatus::ACTIVE,
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

    /**
     * @return $this
     */
    public function markAsFeatured(): static
    {
        $this->isFeatured = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function removeFeaturedFlag(): static
    {
        $this->isFeatured = false;
        return $this;
    }

    public function __construct()
    {
        $this->items = new ArrayCollection;
    }

    /**
     * @param PropertyImageVersion $version
     * @return string|null
     */
    public function filePath(PropertyImageVersion $version): string|null
    {
        $imageItem = $this->imageItem($version);

        return $imageItem->getFilePath() ?? null;
    }

    /**
     * @param PropertyImageVersion $version
     * @return ImageItem|null
     */
    public function imageItem(PropertyImageVersion $version): ?ImageItem
    {
        foreach($this->items as $imageItem) {
            if($imageItem->getVersion() === $version) {
                return $imageItem;
            }
        }

        return null;
    }

    /**
     * @return PropertyImageTarget
     */
    public function getTarget(): PropertyImageTarget
    {
        return $this->target;
    }

    /**
     * @param PropertyImageTarget $target
     * @return PropertyImage
     */
    public function setTarget(PropertyImageTarget $target): PropertyImage
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return PropertyImage
     */
    public function setTitle(?string $title): PropertyImage
    {
        $this->title = $title;
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
     * @return PropertyImage
     */
    public function setDescription(?string $description): PropertyImage
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFeatured(): ?bool
    {
        return $this->isFeatured;
    }

    /**
     * @param bool|null $isFeatured
     * @return PropertyImage
     */
    public function setIsFeatured(?bool $isFeatured): PropertyImage
    {
        $this->isFeatured = $isFeatured;
        return $this;
    }

    /**
     * @return ArrayCollection|ImageItem[]
     */
    public function getItems(): ArrayCollection|array
    {
        return $this->items;
    }

    /**
     * @param ArrayCollection|ImageItem[] $items
     * @return PropertyImage
     */
    public function setItems(ArrayCollection|array $items): PropertyImage
    {
        $this->items = $items instanceof ArrayCollection ? $items : new ArrayCollection($items);

        return $this;
    }

    /**
     * @param ImageItem $item
     * @return $this
     */
    public function addItem(ImageItem $item): static
    {
        $this->items->add($item);
        return $this;
    }

    /**
     * @return Verification|null
     */
    public function getVerification(): ?Verification
    {
        return $this->verification;
    }

    /**
     * @param Verification|null $verification
     * @return PropertyImage
     */
    public function setVerification(?Verification $verification): PropertyImage
    {
        $this->verification = $verification;
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
     * @return PropertyImage
     */
    public function setSortOrder(?int $sortOrder): PropertyImage
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTargetSortOrder(): ?int
    {
        return $this->targetSortOrder;
    }

    /**
     * @param int|null $targetSortOrder
     * @return PropertyImage
     */
    public function setTargetSortOrder(?int $targetSortOrder): PropertyImage
    {
        $this->targetSortOrder = $targetSortOrder;
        return $this;
    }

    /**
     * @return PropertyImageStatus
     */
    public function getStatus(): PropertyImageStatus
    {
        return $this->status;
    }

    /**
     * @param PropertyImageStatus $status
     * @return PropertyImage
     */
    public function setStatus(PropertyImageStatus $status): PropertyImage
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return UserReference
     */
    public function getUploadedBy(): UserReference
    {
        return $this->uploadedBy;
    }

    /**
     * @param UserReference $uploadedBy
     * @return PropertyImage
     */
    public function setUploadedBy(UserReference $uploadedBy): PropertyImage
    {
        $this->uploadedBy = $uploadedBy;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getDeletedAt(): ?Carbon
    {
        return $this->deletedAt;
    }

    /**
     * @param Carbon|null $deletedAt
     * @return PropertyImage
     */
    public function setDeletedAt(?Carbon $deletedAt): PropertyImage
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    /**
     * @return PropertyImageRepository
     */
    public static function repository(): PropertyImageRepository
    {
        return parent::repository();
    }
}
