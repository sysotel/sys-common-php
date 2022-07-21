<?php

namespace SYSOTEL\APP\Common\Enums;

trait BackedEnumHelpers
{
    /**
     * @param $val
     * @return bool
     */
    public function hasValue($val): bool
    {
        return $this->value === $val;
    }

    /**
     * @param $enum
     * @return bool
     */
    public function is($enum): bool
    {
        return $this === $enum;
    }
}
