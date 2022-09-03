<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum InventoryFormatType: string
{
    use EnumLabelExtension;

    case DAILY = 'DAILY';
    case HOURLY = 'HOURLY';

}
