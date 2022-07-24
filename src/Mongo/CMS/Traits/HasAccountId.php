<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use SYSOTEL\APP\Common\Enums\CMS\Account;

trait HasAccountId
{
    /**
     * @var Account
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\Account::class)
     */
    public $accountId;
}
