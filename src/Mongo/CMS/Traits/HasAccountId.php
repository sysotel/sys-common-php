<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use SYSOTEL\APP\Common\Enums\CMS\Account;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait HasAccountId
{
    /**
     * @var ?Account
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\Account::class)
     */
    private $accountId;

    /**
     * @return ?Account
     */
    public function getAccountId(): ?Account
    {
        return $this->accountId;
    }

    /**
     * @param ?Account $accountId
     * @return static
     */
    public function setAccountId(?Account $accountId): static
    {
        $this->accountId = $accountId;

        return $this;
    }
}
