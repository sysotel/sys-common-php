<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Support\Collection;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\LocationEQB;
use SYSOTEL\APP\Common\DB\Models\Location\Location;
use SYSOTEL\APP\Common\Enums\CMS\CountrySlug;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Enums\CMS\StateSlug;

class LocationER extends EloquentRepository
{
    public function getByTypeAndSlug(LocationType $type, string $slug): Location|LocationEQB|null
    {
        return Location::query()
            ->whereCategorySlug($slug)
            ->whereType($type)
            ->first();
    }

    public function getCountryBySlug(CountrySlug $slug): Location|LocationEQB|null
    {
        return $this->getByTypeAndSlug(LocationType::COUNTRY, $slug->value);
    }

    public function getStateBySlug(StateSlug $slug): Location|LocationEQB|null
    {
        return $this->getByTypeAndSlug(LocationType::STATE, $slug->value);
    }

    /**
     * @return Collection & Location[]
     */
    public function getAllCountries(): array|Collection
    {
        return Location::query()->whereType(LocationType::COUNTRY)->get();
    }

    public function getStatesForCountry(string $countryId): \Illuminate\Database\Eloquent\Collection|array
    {
        return Location::query()
            ->whereType(LocationType::STATE)
            ->whereCountryId($countryId)
            ->get();
      }

    public function getCitiesForState(string $stateId): \Illuminate\Database\Eloquent\Collection|array
    {
        return Location::query()
            ->whereType(LocationType::CITY)
            ->whereStateId($stateId)
            ->get();
    }

    public function getAreasForCity(string $cityId): \Illuminate\Database\Eloquent\Collection|array
    {
        return Location::query()
            ->whereType(LocationType::AREA)
            ->whereCityId($cityId)
            ->get();
    }

    public function getStateForCountry(string $stateId, string $countryId)
    {
        return Location::query()
            ->where('id', $stateId)
            ->whereType(LocationType::STATE)
            ->whereCountryId($countryId)
            ->first();
    }

    public function getCityForState(string $cityId, string $stateId)
    {
        return Location::query()
            ->where('id', $cityId)
            ->whereType(LocationType::CITY)
            ->whereStateId($stateId)
            ->first();
    }

    public function getAreaForCity(string $areaId, string $cityId)
    {
        return Location::query()
            ->where('id', $areaId)
            ->whereType(LocationType::AREA)
            ->whereCityId($cityId)
            ->first();
    }

//    /**
//     * @return State[]
//     */
//    public function findAllStatesForCountry(string|Country $country, array $criteria = [], array $orderBy = []): array
//    {
//        $countryId = $country instanceof Country ? $country->getId() : $country;
//
//        $criteria = array_merge([
//            'type' => LocationType::STATE->value,
//            'country.id' => new ObjectId($countryId)
//        ], $criteria);
//
//        $orderBy = array_merge([
//            'name' => 1
//        ], $orderBy);
//
//        return $this->findBy($criteria, $orderBy);
//    }
//
//    /**
//     * @param string|State $state
//     * @param array $criteria
//     * @param array $orderBy
//     * @return City[]
//     */
//    public function findAllCitiesForState(string|State $state, array $criteria = [], array $orderBy = []): array
//    {
//        $stateId = $state instanceof State ? $state->getId() : $state;
//
//        $criteria = array_merge([
//            'type' => LocationType::CITY->value,
//            'state.id' => new ObjectId($stateId)
//        ], $criteria);
//
//        $orderBy = array_merge([
//            'name' => 1
//        ], $orderBy);
//
//        return $this->findBy($criteria, $orderBy);
//    }
//
//    /**
//     * @param string|Area $area
//     * @param array $criteria
//     * @param array $orderBy
//     * @return Area[]
//     */
//    public function findAllAreasForCity(string|Area $area, array $criteria = [], array $orderBy = []): array
//    {
//        $areaId = $area instanceof Area ? $area->getId() : $area;
//
//        $criteria = array_merge([
//            'type' => LocationType::AREA->value,
//            'city.id' => new ObjectId($areaId)
//        ], $criteria);
//
//        $orderBy = array_merge([
//            'name' => 1
//        ], $orderBy);
//
//        return $this->findBy($criteria, $orderBy);
//    }

}
