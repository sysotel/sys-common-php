<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use Exception;

enum MealPlanCode: string
{
    case EP = 'EP';
    case CP = 'CP';
    case MAP = 'MAP';
    case AP = 'AP';

    public function inclusions(): array
    {
        return match($this) {
            self::CP => ['FREE Breakfast'],
            self::MAP => ['FREE Breakfast', 'FREE Lunch or Dinner'],
            self::AP => ['FREE Breakfast', 'All Meals FREE'],
            default => []
        };
    }
}
