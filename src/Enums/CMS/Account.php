<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum Account: string
{
    use BackedEnumHelpers;

    case SELF = 'SELF';
}
