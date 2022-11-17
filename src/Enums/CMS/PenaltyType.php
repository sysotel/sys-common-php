<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum PenaltyType: string
{
    use BackedEnumHelpers;

    case PERCENT = 'PERCENT';
    case FLAT = 'FLAT';
}
