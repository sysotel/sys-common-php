<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum PropertyImageTarget: string
{
    use BackedEnumHelpers;

    case PROPERTY = 'PROPERTY';
    case SPACE = 'SPACE';
    case AMENITY = 'AMENITY';
    case GUEST_UPLOADED = 'GUEST_UPLOADED';
}
