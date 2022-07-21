<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PropertySpaceType: string
{
    use EnumLabelExtension;

    case SINGLE = 'SINGLE';
    case DOUBLE = 'DOUBLE';
    case TRIPLE = 'TRIPLE';
    case QUAD = 'QUAD';
}
