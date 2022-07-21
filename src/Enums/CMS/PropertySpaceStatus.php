<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PropertySpaceStatus: string
{
    use EnumLabelExtension;

    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
}
