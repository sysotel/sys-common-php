<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use Illuminate\Support\Collection;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\City;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\State;

class CityRepository extends DocumentRepository
{
    public function getForState(string|State $state, array $criteria = [], array $orderBy = []): Collection
    {
        $stateID = $state instanceof State ? $state->id : $state;

        $criteria = array_merge([
            'state.id' => new ObjectId($stateID)
        ], $criteria);

        $orderBy = array_merge([
            'name' => 1
        ], $orderBy);

        return $this->getCollectionBy($criteria, $orderBy);
    }

    /**
     * @param string $slug
     * @return City|null
     */
    public function findBySlug(string $slug): ?City
    {
        return $this->findOneBy(compact('slug'));
    }
}
