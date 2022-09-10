<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum BookingSlot: int
{
    use BackedEnumHelpers;

    case FIFTEEN_MINUTES = 15;
    case THIRTY_MINUTES = 30;
    case FORTY_FIVE_MINUTES = 45;

    case ONE_HOUR = 60;
    case TWO_HOURS = 120;
    case THREE_HOURS = 180;
    case FOUR_HOURS = 240;
    case FIVE_HOURS = 300;
    case SIX_HOURS = 360;

    case ONE_DAY = 360;
    case TWO_DAY = 360;
}
