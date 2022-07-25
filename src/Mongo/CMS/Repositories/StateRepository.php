<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use Illuminate\Support\Collection;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\Country;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\State;

class StateRepository extends DocumentRepository
{
    /**
     * @param string|Country $country
     * @param array $criteria
     * @param array $orderBy
     * @return Collection
     */
    public function getForCountry(string|Country $country, array $criteria = [], array $orderBy = []): Collection
    {
        $criteria = array_merge([
            'country.id' => Country::resolveID($country)
        ], $criteria);

        $orderBy = array_merge([
            'name' => 1
        ], $orderBy);

        return $this->getCollectionBy($criteria, $orderBy);
    }

    /**
     * @param string $slug
     * @return State|null
     */
    public function findBySlug(string $slug): ?State
    {
        return $this->findOneBy(compact('slug'));
    }

    /**
     * @param string $code
     * @return State|null
     */
    public function findByCode(string $code): ?State
    {
        return $this->findOneBy(compact('code'));
    }
}
