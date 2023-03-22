<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Support\Collection;
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
}
