<?php

namespace SYSOTEL\APP\Common\Contracts;

trait HasStaticConstructor
{
    /**
     * @param ...$args
     * @return static
     */
    public static function create(...$args): static
    {
        return new static(...$args);
    }
}
