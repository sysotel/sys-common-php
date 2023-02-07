<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PromotionDateType: string
{
    use EnumLabelExtension;

    case STAY_DATE = 'STAY_DATE';
    case STAY_DATE_BOOKING_DATE = 'STAY_DATE_BOOKING_DATE';
}
