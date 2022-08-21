<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum PropertyImageStatus: string
{
    use BackedEnumHelpers;

    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
    case REJECTED = 'REJECTED';
    case DELETED = 'DELETED';
}
