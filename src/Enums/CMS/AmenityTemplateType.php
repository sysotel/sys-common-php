<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum AmenityTemplateType: string
{
    use BackedEnumHelpers;

    case SINGLE_SELECT = 'SINGLE_SELECT';
    case MULTI_SELECT = 'MULTI_SELECT';
}
