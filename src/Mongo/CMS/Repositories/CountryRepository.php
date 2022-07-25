<?php

namespace SYSOTEL\OTA\Common\DB\MongoODM\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\State;

class CountryRepository extends DocumentRepository
{
    /**
     * @param string $slug
     * @return State|null
     */
    public function finBySlug(string $slug): ?State
    {
        return $this->findOneBy(compact('slug'));
    }
}
