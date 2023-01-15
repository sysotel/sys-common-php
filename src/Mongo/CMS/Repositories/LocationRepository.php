<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\City;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\Country;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\State;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Area;

class LocationRepository extends DocumentRepository
{
    /**
     * @return Country[]
     */
    public function findAllCountries(): array
    {
        return $this->findBy([
            'type' => LocationType::COUNTRY->value
        ]);
    }

    /**
     * @return State[]
     */
    public function findAllStatesForCountry(string|Country $country, array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge([
            'type' => LocationType::COUNTRY,
            'country.id' => Country::resolveID($country)
        ], $criteria);

        $orderBy = array_merge([
            'name' => 1
        ], $orderBy);

        return $this->findBy($criteria, $orderBy);
    }

    /**
     * @param string|State $state
     * @param array $criteria
     * @param array $orderBy
     * @return City[]
     */
    public function findAllCitiesForState(string|State $state, array $criteria = [], array $orderBy = []): array
    {
        $stateID = $state instanceof State ? $state->getId() : $state;

        $criteria = array_merge([
            'type' => LocationType::STATE,
            'state.id' => new ObjectId($stateID)
        ], $criteria);

        $orderBy = array_merge([
            'name' => 1
        ], $orderBy);

        return $this->findBy($criteria, $orderBy);
    }

    /**
     * @param string|Area $area
     * @param array $criteria
     * @param array $orderBy
     * @return Area[]
     */
    public function findAllAreasForState(string|Area $area, array $criteria = [], array $orderBy = []): array
    {
        $areaId = $area instanceof Area ? $area->getId() : $area;

        $criteria = array_merge([
            'type' => LocationType::AREA,
            'area.id' => new ObjectId($areaId)
        ], $criteria);

        $orderBy = array_merge([
            'name' => 1
        ], $orderBy);

        return $this->findBy($criteria, $orderBy);
    }
}
