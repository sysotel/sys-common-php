<?php

namespace SYSOTEL\APP\Common\DB\Helpers;

use SYSOTEL\APP\Common\DB\Models\Counter\Counter;
use SYSOTEL\APP\Common\DB\Models\Model;

class NumericIdGenerator
{
    public static function get(string|Model $model): ?int
    {
        $collection = is_string($model) ? $model : $model->getCollection();

        /** @var ?Counter $counter */
        $counter = Counter::query()->where('id', $collection)->first();
        if(! $counter) {
            abort(500, 'Counter not found for ' . $collection);
        }

        $counter->value += $counter->value + 1;
        $counter->save();

        return $counter->value;
    }
}
