<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyImage;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyImageEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertyImageER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\common\UserReference;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertyImage\embedded\ImageItem;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageVersion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Verification;

/**
 * @property ?int $id
 * @property ?Account $accountId
 * @property ?int $propertyId
 * @property ?int $spaceId
 * @property ?PropertyImageTarget $target
 * @property ?string $title
 * @property ?string $description
 * @property ?bool $isFeatured
 * @property Collection $items
 * @property ?Verification $verification
 * @property ?int $targetSortOrder
 * @property ?PropertyImageStatus $status
 * @property ?UserReference $uploadedBy
 * @property ?Carbon $deletedAt
 */
class PropertyImage extends Model
{

    protected $attributes = [
        'isFeatured' => false,
        'sortOrder' => 0,
        'targetSortOrder' => 0,
        'status' => PropertyImageStatus::ACTIVE,
    ];

    protected $casts = [
        'status' => PropertyImageStatus::class,
    ];

    public function items(): EmbedsMany
    {
        return $this->embedsMany(ImageItem::class);
    }

    public function verification(): EmbedsOne
    {
        return $this->embedsOne(Verification::class);
    }

    public function uploadedBy(): EmbedsOne
    {
        return $this->embedsOne(UserReference::class);
    }

    public static function query(): PropertyImageEQB
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): PropertyImageEQB
    {
        return new PropertyImageEQB($query);
    }

    /**
     * @return PropertyImageER
     */
    public static function repository(): PropertyImageER
    {
        return new PropertyImageER;
    }

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

    public function filePath(PropertyImageVersion $version): ?string
    {
        $imageItem = $this->items->firstWhere('version', $version);

        return $imageItem ? $imageItem->getFilePath() : null;
    }

    public function imageItem(PropertyImageVersion $version): ?ImageItem
    {
        return $this->items->firstWhere('version', $version);
    }
}
