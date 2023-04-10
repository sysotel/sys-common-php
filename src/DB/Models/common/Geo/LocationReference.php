<?php

namespace SYSOTEL\APP\Common\DB\Models\common\Geo;

use SYSOTEL\APP\Common\Casts\AsObjectIdString;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\DB\Models\Location\Location;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;

/**
 * @property ?string $id
 * @property ?string $name
 * @property ?string $categorySlug
 * @property ?LocationType $type
 */
class LocationReference extends EmbeddedModel
{
    protected $casts = [
        'id' => AsObjectIdString::class,
        'type' => LocationType::class
    ];

    /**
     * @param Location $location
     * @return static
     */
    public static function createFromLocation(Location $location): static
    {
        $instance = new self;
        $instance->id = $location->id;
        $instance->name = $location->name;
        $instance->categorySlug = $location->categorySlug;
        $instance->type = $location->type;
        return $instance;
    }
}
