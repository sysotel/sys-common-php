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
    case AIRPORT_VIEW = 'AIRPORT_VIEW';
    case BAY_VIEW = 'BAY_VIEW';
    case BEACH_VIEW = 'BEACH_VIEW';
    case CASTLE_VIEW = 'CASTLE_VIEW';
    case COUNTRY_SIDE_VIEW = 'COUNTRY_SIDE_VIEW';
    case COURTYARD_VIEW = 'COURTYARD_VIEW';
    case DUNE_VIEW = 'DUNE_VIEW';
    case FOREST_VIEW = 'FOREST_VIEW';
    case GOLF_COURSE_VIEW = 'GOLF_COURSE_VIEW';
    case HARBOR_VIEW = 'HARBOR_VIEW';
    case LAGOON_VIEW = 'LAGOON_VIEW';
    case MARIANA_VIEW = 'MARIANA_VIEW';
    case PARK_VIEW = 'PARK_VIEW';
    case PARTIAL_OCEAN_VIEW = 'PARTIAL_OCEAN_VIEW';
    case PYRAMID_VIEW = 'PYRAMID_VIEW';
    case STREET_VIEW = 'STREET_VIEW';
    case OTHER = 'OTHER';
}
