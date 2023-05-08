<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Database\Eloquent\Collection;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\Enums\CMS\Account;

class PropertyER extends EloquentRepository
{
    /**
     * @param array $ids
     * @return Collection & Property[]
     */
    public function getByIds(array $ids): Collection
    {
        return Property::query()->whereIn('_id', $ids)->get();
    }

    public function getById(int $id): Collection
    {
        return Property::query()->where('_id', $id)->get();
    }

    public function getBySlug(string $slug): ?Property
    {
        return Property::query()->whereSlug($slug)->first();
    }

    public function getByAccountSlug(string $slug): ?Property
    {
        return Property::query()->whereAccountSlug($slug)->first();
    }

    /**
     * @param Account $account
     * @return Collection|array
     */
    public function getAllForAccount(Account $account): Collection|array
    {
        return Property::query()->whereAccountId($account)->get();
    }

    /**
     * @return Collection
     */
    public function getDailyBookingProperties(): Collection
    {
        return Property::query()->whereDailyBookingType()->get();
    }

    /**
     * @return Collection
     */
    public function getHourlyBookingProperties(): Collection
    {
        return Property::query()->whereHourlyBookingType()->get();
    }
}
