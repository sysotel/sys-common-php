<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum SpaceTypeByOccupancy: string
{
    use BackedEnumHelpers;

    case SINGLE = 'SINGLE';
    case DOUBLE = 'DOUBLE';
    case TRIPLE = 'TRIPLE';
    case QUAD = 'QUAD';
}
