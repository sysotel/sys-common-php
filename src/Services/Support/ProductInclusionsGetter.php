<?php

namespace SYSOTEL\APP\Common\Services\Support;

use SYSOTEL\APP\Common\Enums\CMS\MealPlanCode;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct\PropertyProduct;

class ProductInclusionsGetter
{
    public static function get(PropertyProduct $product): array
    {
        $inclusions = match($product->getMealPlanCode()) {
            MealPlanCode::CP => ['FREE Breakfast'],
            MealPlanCode::MAP => ['FREE Breakfast', 'FREE Lunch or Dinner'],
            MealPlanCode::AP => ['FREE Breakfast', 'All Meals FREE'],
            default => []
        };

        return array_merge($inclusions, $product->getInclusions());
    }
}
