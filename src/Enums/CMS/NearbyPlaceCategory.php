<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum NearbyPlaceCategory: string
{
    use BackedEnumHelpers;

    case AIRPORT = 'AIRPORT';
    case RAILWAY_STATION = 'RAILWAY_STATION';
    case BUS_STATION = 'BUS_STATION';
    CASE OTHER = 'OTHER';
}
