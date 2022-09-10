<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum InventoryAccuracy: string
{
    use EnumLabelExtension;

    case DAILY = 'DAILY';
    case TIMELY = 'TIMELY';
}
