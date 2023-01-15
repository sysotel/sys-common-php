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
     * @param CountrySlug $slug
     * @return Country|null
     */
    public function findCountryBySlug(CountrySlug $slug): ?Country
    {
        return $this->findOneBy([
            'type' => LocationType::COUNTRY->value,
            'categorySlug' => $slug->value
        ]);
    }

    /**
     * @param StateSlug $slug
     * @return State|null
     */
    public function findStateBySlug(StateSlug $slug): State|null
    {
        return $this->findOneBy([
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
            'type' => LocationType::STATE->value,
            'country.id' => new ObjectId($countryId)
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
            'type' => LocationType::CITY->value,
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
    public function findAllAreasForCity(string|Area $area, array $criteria = [], array $orderBy = []): array
    {
        $areaId = $area instanceof Area ? $area->getId() : $area;

        $criteria = array_merge([
            'type' => LocationType::AREA->value,
            'city.id' => new ObjectId($areaId)
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
            '_id' => new ObjectId($stateId),
            'type' => LocationType::STATE->value,
            'country.id' => new ObjectId($countryId),
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
            '_id' => new ObjectId($cityId),
            'type' => LocationType::CITY->value,
            'state.id' => new ObjectId($stateId),
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
            '_id' => new ObjectId($areaId),,
            'type' => LocationType::AREA->value,
            'state.id' => new ObjectId($cityId),
        ]);
    }
}
