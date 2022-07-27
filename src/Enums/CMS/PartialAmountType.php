<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PartialAmountType: string
{
    use EnumLabelExtension;

    case PERCENTAGE = 'PERC';
    case VALUE = 'VALUE';
}
