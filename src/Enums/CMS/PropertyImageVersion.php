<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum PropertyImageVersion: string
{
    use BackedEnumHelpers;

    case ORIGINAL = 'ORG';
    case ORIGINAL_NORMALIZED = 'ORG_NORM';

    case SQUARE_SMALL = 'SQ_SM';
    case SQUARE_MEDIUM = 'SQ_MD';
    case SQUARE_LARGE = 'SQ_LG';

    case STANDARD_SMALL = 'STD_SM';
    case STANDARD_MEDIUM = 'STD_MD';
    case STANDARD_LARGE = 'STD_LG';
}
