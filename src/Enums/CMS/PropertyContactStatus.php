<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum PropertyContactStatus: string
{
    use BackedEnumHelpers;

    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
}
