<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PropertySpaceViewCode: string
{
    use EnumLabelExtension;

    case OCEAN_VIEW = 'OCEAN_VIEW';
    case MOUNTAIN_VIEW = 'MOUNTAIN_VIEW';
    case VALLEY_VIEW = 'VALLEY_VIEW';
    case PALACE_VIEW = 'PALACE_VIEW';
    case JUNGLE_VIEW = 'JUNGLE_VIEW';
    case CITY_VIEW = 'CITY_VIEW';
    case GARDEN_VIEW = 'GARDEN_VIEW';
    case LAKE_VIEW = 'LAKE_VIEW';
    case POOL_VIEW = 'POOL_VIEW';
    case RIVER_VIEW = 'RIVER_VIEW';
    case OTHER = 'OTHER';
}
