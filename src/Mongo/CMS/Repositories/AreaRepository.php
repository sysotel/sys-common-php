<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\City;

class AreaRepository extends DocumentRepository
{
    public function findForCity(string|City $city, array $criteria = [], array $orderBy = []): array
    {
        $cityID = $city instanceof City ? $city->getId() : $city;

        $criteria = array_merge([
            'city.id' =>  new ObjectId($cityID)
        ], $criteria);

        $orderBy = array_merge([
            'name' => 1
        ], $orderBy);

        return $this->findBy($criteria, $orderBy);
    }
}
