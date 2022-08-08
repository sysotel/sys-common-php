<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum AmenityStatus: string
{
    use BackedEnumHelpers;

    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
}
