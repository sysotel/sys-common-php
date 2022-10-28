<?php

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

if (! function_exists('generateRandomNumber')) {
    /**
     * Generate random number of given length
     *
     * @throws Exception
     * @aurhor Ravish
     */
    function generateRandomNumber($length): int
    {
        $min = 10;
        foreach (range(1, $length) as $ignored) {
            $min *= 10;
        }

        $max = ($min * 10) - 1;

        return random_int($min, $max);
    }
}

if (! function_exists('arrayFilter')) {
    /**
     * Returns true if app is running in production environment
     *
     * @param  array  $array
     * @return array
     * @aurhor Ravish
     */
    function arrayFilter(array $array): array
    {
        return array_filter($array, function ($value) {
            return isset($value);
        });
    }
}

if (! function_exists('trimUnderscores')) {

    /**
     * @param  string  $value
     * @return string
     */
    function trimUnderscores(string $value): string
    {
        return Str::replace('_', ' ', $value);
    }
}

if (! function_exists('readableConstant')) {

    /**
     * @param  string  $value
     * @return string
     */
    function readableConstant(string $value): string
    {
        return ucwords(strtolower(Str::replace('_', ' ', $value)));
    }
}

if (! function_exists('toArrayOrNull')) {

    /**
     * @param  Arrayable|null  $arrayable
     * @return array|null
     */
    function toArrayOrNull(Arrayable $arrayable = null): ?array
    {
        return isset($arrayable) ? $arrayable->toArray() : null;
    }
}

if (! function_exists('enumValues')) {

    /**
     * @param $enumClass
     * @return array
     */
    function enumValues($enumClass): array
    {
        return array_column($enumClass::cases(), 'value');
    }
}

if(!function_exists('googleMapUrl')) {
    /**
     * @param float $lat
     * @param float $lng
     * @return string
     */
    function googleMapUrl(float $lat, float $lng): string
    {
        return "https://www.google.com/maps?q=$lat,$lng";
    }
}
