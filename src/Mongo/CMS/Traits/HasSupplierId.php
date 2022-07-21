<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use SYSOTEL\APP\Common\Enums\SupplierId;

trait HasSupplierId
{
    /**
     * @var SupplierId
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\SupplierId::class)
     */
    public $supplierId;
}
