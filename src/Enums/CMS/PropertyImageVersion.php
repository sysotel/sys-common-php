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

    /**
     * @return array|null
     */
    public function dimentions(): ?array
    {
        return match ($this) {
            self::SQUARE_SMALL => [100, 100],
            self::SQUARE_MEDIUM => [200, 200],
            self::SQUARE_LARGE => [400, 400],
            self::STANDARD_SMALL => [520/2, 350/2],
            self::STANDARD_MEDIUM => [520, 350],
            self::STANDARD_LARGE => [520*2, 350*2],
            default => null
        };
    }
}
