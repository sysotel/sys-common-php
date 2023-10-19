<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PropertyContactType: string
{
    use EnumLabelExtension;

    case GUEST_INQUIRY = 'GUEST_INQUIRY';
    case RESERVATION = 'RESERVATION';
    case BOOKING_INQUIRY = 'BOOKING_INQUIRY';
}
