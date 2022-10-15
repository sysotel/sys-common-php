<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum Timezone: string
{
    use BackedEnumHelpers;

    case ASIA_KOLKATA = 'Asia/Kolkata';
}
