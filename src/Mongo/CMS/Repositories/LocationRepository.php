<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use MongoDB\BSON\ObjectId;
use MongoDB\Operation\Count;
use SYSOTEL\APP\Common\Enums\CMS\CountrySlug;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Enums\CMS\StateSlug;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types\Area;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types\City;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types\Country;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types\State;

class LocationRepository extends DocumentRepository
{
    /**
     * @return Country[]
     */
    public function findCountryBySlug(CountrySlug $slug): array
    {
        return $this->findBy([
            'type' => LocationType::COUNTRY->value,
            'categorySlug' => $slug
        ]);
    }

    /**
     * @return Country[]
     */
    public function findStateBySlug(StateSlug $slug): array
    {
        return $this->findBy([
            'type' => LocationType::STATE->value,
            'categorySlug' => $slug
        ]);
    }

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
        $countryId = $country instanceof Country ? $country->getId() : $country;

        $criteria = array_merge([
            'type' => LocationType::COUNTRY,
            'country.id' => $countryId
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
        $stateId = $state instanceof State ? $state->getId() : $state;

        $criteria = array_merge([
            'type' => LocationType::STATE,
            'state.id' => new ObjectId($stateId)
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

    /**
     * @param string $stateId
     * @param string|Country $country
     * @return State|null
     */
    public function findStateForCountry(string $stateId, string|Country $country): ?State
    {
        $countryId = $country instanceof Country ? $country->getId() : $country;

        return $this->findOneBy([
            '_id' => $stateId,
            'type' => LocationType::STATE,
            'country.id' => $countryId
        ]);
    }

    /**
     * @param string $cityId
     * @param string|State $state
     * @return City|null
     */
    public function findCityForState(string $cityId, string|State $state): ?City
    {
        $stateId = $state instanceof Country ? $state->getId() : $state;

        return $this->findOneBy([
            '_id' => $cityId,
            'type' => LocationType::CITY,
            'state.id' => $stateId
        ]);
    }

    /**
     * @param string $areaId
     * @param string|City $city
     * @return Area|null
     */
    public function findAreaForCity(string $areaId, string|City $city): ?Area
    {
        $cityId = $city instanceof Country ? $city->getId() : $city;

        return $this->findOneBy([
            '_id' => $areaId,
            'type' => LocationType::AREA,
            'state.id' => $cityId
        ]);
    }
}
