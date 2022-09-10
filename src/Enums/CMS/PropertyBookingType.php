<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;
use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PropertyBookingType: string
{
    use BackedEnumHelpers, EnumLabelExtension;

    case DAILY = 'DAILY';
    case HOURLY = 'HOURLY';
}
