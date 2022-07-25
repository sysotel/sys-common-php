<?php

namespace SYSOTEL\OTA\Common\DB\MongoODM\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use Illuminate\Support\Collection;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\City;

class AreaRepository extends DocumentRepository
{
    public function getForCity(string|City $city, array $criteria = [], array $orderBy = []): Collection
    {
        $cityID = $city instanceof City ? $city->id : $city;

        $criteria = array_merge([
            'city.id' => new ObjectId($cityID)
        ], $criteria);

        $orderBy = array_merge([
            'name' => 1
        ], $orderBy);

        return $this->getCollectionBy($criteria, $orderBy);
    }
}
