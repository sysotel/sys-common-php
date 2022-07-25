<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;

class PropertyRepository extends DocumentRepository
{
    /**
     * @param string $slug
     * @return Property|null
     */
    public function findBySlug(string $slug): ?Property
    {
        return $this->findOneBy([
            'slug' => $slug
        ]);
    }

    /**
     * @param Account $account
     * @param string $slug
     * @return Property|null
     */
    public function findByAccountSlug(Account $account, string $slug): ?Property
    {
        return $this->findOneBy([
            'accountId' => $account->value,
            'accountSlug' => $slug
        ]);
    }
}
