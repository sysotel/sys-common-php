<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum LateCheckOutStatus: string
{
    use EnumLabelExtension;

    case ALLOWED = 'ALLOWED';
    case NOT_ALLOWED = 'NOT_ALLOWED';
    case AS_PER_AVAILABILITY = 'AS_PER_AVAILABILITY';
}
