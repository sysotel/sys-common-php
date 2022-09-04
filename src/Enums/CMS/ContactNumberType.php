<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum ContactNumberType: string
{
    use BackedEnumHelpers;

    case MOBILE = 'MOBILE';
    case TELEPHONE = 'TELEPHONE';
}
