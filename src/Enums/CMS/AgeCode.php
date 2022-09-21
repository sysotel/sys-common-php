<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum AgeCode: string
{
    use BackedEnumHelpers;

    case ADULT = 'A';
    case CHILD = 'C';
    case INFANT = 'I';
}
