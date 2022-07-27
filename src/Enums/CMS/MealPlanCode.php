<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use Exception;

enum MealPlanCode: string
{
    case EP = 'EP';
    case CP = 'CP';
    case MAP = 'MAP';
    case AP = 'AP';

    /**
     * @throws Exception
     */
    public function inclusions(): array
    {
        return match($this) {
            self::EP => [],
            self::CP => ['FREE Breakfast'],
            self::MAP => ['FREE Breakfast', 'FREE Lunch or Dinner'],
            self::AP => ['FREE Breakfast', 'All Meals FREE'],
            default => throw new Exception('Unexpected match value')
        };
    }
}
