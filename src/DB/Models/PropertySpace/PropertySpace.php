<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertySpace;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertySpaceER;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\InventorySettings;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;

/**
 * @property ?int $id
 * @property ?Account $accountId
 * @property ?int $propertyId
 * @property ?string $displayName
 * @property ?string $internalName
 * @property ?string $shortDescription
 * @property ?string $longDescription
 * @property ?int $noOfUnits
 * @property ?SpaceOccupancy $occupancy
 * @property ?SpaceView $view
 * @property ?bool $noSmoking
 * @property ?PropertySpaceStatus $status
 * @property ?InventorySettings $inventorySettings
 * @property ?int $sortOrder
 */
class PropertySpace extends Model
{

    protected $collection = 'propertySpaces';

    protected $attributes = [
        'status' => PropertySpaceStatus::ACTIVE,
        'stayType' => SpaceStayType::PRIVATE,
        'sortOrder' => 0
    ];

    protected $casts = [
        'accountId' => Account::class,
        'stayType' => SpaceStayType::class,
        'status' => PropertySpaceStatus::class,
    ];

    public function occupancy(): EmbedsOne
    {
        return $this->embedsOne(SpaceOccupancy::class);
    }

    public function view(): EmbedsOne
    {
        return $this->embedsOne(SpaceView::class);
    }

    public function inventorySettings(): EmbedsOne
    {
        return $this->embedsOne(InventorySettings::class);
    }

    public static function query(): PropertySpaceEQB
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): PropertySpaceEQB
    {
        return new PropertySpaceEQB($query);
    }

    /**
     * @return PropertySpaceER
     */
    public static function repository(): PropertySpaceER
    {
        return new PropertySpaceER;
    }
}
