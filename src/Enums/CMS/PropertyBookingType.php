<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum PropertyBookingType: string
{
    use BackedEnumHelpers;

    case DAILY = 'DAILY';
    case HOURLY = 'HOURLY';
}
