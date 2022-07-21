<?php

namespace SYSOTEL\APP\Common\Casts;

use BackedEnum;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class EnumValue implements CastsAttributes
{
    public function __construct(
        protected string $enumClass
    ) {
    }

    /**
     * Cast the given value.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return BackedEnum|null
     */
    public function get($model, string $key, $value, array $attributes): BackedEnum|null
    {
        return is_subclass_of($this->enumClass, BackedEnum::class) && isset($value)
            ? $this->enumClass::from($value)
            : null;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return string|null
     */
    public function set($model, string $key, $value, array $attributes): ?string
    {
        return $value instanceof BackedEnum
            ? $value->value
            : null;
    }
}
