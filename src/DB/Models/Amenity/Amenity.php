<?php

namespace SYSOTEL\APP\Common\DB\Models\Amenity;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\AmenityEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\AmenityER;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertySpaceER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\Amenity\embedded\AmenityDetailsTemplate;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\InventorySettings;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\AmenityCategory;
use SYSOTEL\APP\Common\Enums\CMS\AmenityStatus;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;

/**
 * @property ?string $id
 * @property ?AmenityTarget $target
 * @property ?AmenityCategory $category
 * @property ?string $name
 * @property ?string $description
 * @property ?bool $isFeatured
 * @property ?int $featureOrder
 * @property ?int $categoryOrder
 * @property ?AmenityStatus $status
 * @property ?AmenityDetailsTemplate $template
*/
class Amenity extends Model
{

    protected $casts = [
        'target' => AmenityTarget::class,
        'category' => AmenityCategory::class,
        'status' => AmenityStatus::class,
    ];


    public function template(): EmbedsOne
    {
        return $this->embedsOne(AmenityDetailsTemplate::class);
    }

    public static function query(): AmenityEQB
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): AmenityEQB
    {
        return new AmenityEQB($query);
    }

    /**
     * @return AmenityER
     */
    public static function repository(): AmenityER
    {
        return new AmenityER;
    }
}
