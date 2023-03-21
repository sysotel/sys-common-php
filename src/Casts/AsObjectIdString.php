<?php

namespace SYSOTEL\APP\Common\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use \MongoDB\BSON\ObjectId;


class AsObjectIdString implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return string|null
     */
    public function get($model, string $key, $value, array $attributes): ?string
    {
        return $value instanceof ObjectId
            ? (string)$value
            : null;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return ObjectId|null
     */
    public function set($model, string $key, $value, array $attributes): ?ObjectId
    {
        return is_string($value)
            ? new ObjectId($value)
            : null;
    }
}
