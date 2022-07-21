<?php

namespace SYSOTEL\APP\Common\Enums;

trait EnumLabelExtension
{
    /**
     * @return string
     */
    public function label(): string
    {
        return readableConstant($this);
    }
}
