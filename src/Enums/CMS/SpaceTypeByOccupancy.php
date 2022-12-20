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

    public function count(): int
    {
        return match($this) {
          self::SINGLE => 1,
          self::DOUBLE => 2,
          self::TRIPLE => 3,
          self::QUAD => 4,
        };
    }
}
