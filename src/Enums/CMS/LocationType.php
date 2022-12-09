<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum LocationType: string
{
    use BackedEnumHelpers;

    case COUNTRY = 'COUNTRY';
    case STATE = 'STATE';
    case CITY = 'CITY';
    case AREA = 'AREA';
}
