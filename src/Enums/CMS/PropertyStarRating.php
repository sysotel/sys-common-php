<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use Exception;

enum PropertyStarRating: int
{
    case ONE_STAR = 1;
    case TWO_STAR = 2;
    case THREE_STAR = 3;
    case FOUR_STAR = 4;
    case FIVE_STAR = 5;

    /**
     * @return string
     * @throws Exception
     */
    public function label(): string
    {
        return match ($this) {
            self::ONE_STAR => '1 Star',
            self::TWO_STAR => '2 Star',
            self::THREE_STAR => '3 Star',
            self::FOUR_STAR => '4 Star',
            self::FIVE_STAR => '5 Star',
            default => throw new Exception('Unexpected match value'),
        };
    }
}

