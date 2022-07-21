<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use SYSOTEL\APP\Common\Enums\AccountId;

trait HasAccountId
{
    /**
     * @var AccountId
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\AccountId::class)
     */
    public $accountId;
}
