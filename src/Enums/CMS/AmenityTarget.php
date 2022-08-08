<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum AmenityTarget: string
{
    use BackedEnumHelpers;

    case PROPERTY = 'PROPERTY';
    case SPACE = 'SPACE';
}
