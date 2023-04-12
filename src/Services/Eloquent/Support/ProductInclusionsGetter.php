<?php

namespace SYSOTEL\APP\Common\Services\Eloquent\Support;

use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\Enums\CMS\MealPlanCode;

class ProductInclusionsGetter
{
    public static function get(PropertyProduct $product): array
    {
        $inclusions = match($product->mealPlanCode) {
            MealPlanCode::CP => ['FREE Breakfast'],
            MealPlanCode::MAP => ['FREE Breakfast', 'FREE Lunch or Dinner'],
            MealPlanCode::AP => ['FREE Breakfast', 'All Meals FREE'],
            default => []
        };

        return array_merge($inclusions, $product->inclusions);
    }
}
