<?php

namespace SYSOTEL\APP\Common\DB\Models\Property;

use Illuminate\Database\Eloquent\Collection;
use Jenssegers\Mongodb\Eloquent\Builder;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyBookingType;

class PropertyEloquentBuilder extends Builder
{
    /**
     * @param Account $accountId
     * @return PropertyEloquentBuilder
     */
    public function whereAccountId(Account $accountId): PropertyEloquentBuilder
    {
        return $this->where('accountId', $accountId);
    }

    /**
     * @return PropertyEloquentBuilder
     */
    public function whereDailyBookingType(): PropertyEloquentBuilder
    {
        return $this->where('allowedBookingTypes', PropertyBookingType::DAILY);
    }

    /**
     * @return PropertyEloquentBuilder
     */
    public function whereHourlyBookingType(): PropertyEloquentBuilder
    {
        return $this->where('allowedBookingTypes', PropertyBookingType::HOURLY);
    }

    /**
     * @param string $slug
     * @return PropertyEloquentBuilder
     */
    public function whereSlug(string $slug): PropertyEloquentBuilder
    {
        return $this->where('slug', $slug);
    }

    /**
     * @param string $slug
     * @return PropertyEloquentBuilder
     */
    public function whereAccountSlug(string $slug): PropertyEloquentBuilder
    {
        return $this->where('accountSlug', $slug);
    }

    /**
     * @param array $ids
     * @return Collection
     */
    public function getByIds(array $ids): Collection
    {
        return $this->whereIn('_id', $ids)->get();
    }

    /**
     * @param Account $account
     * @return Collection|array
     */
    public function getAllForAccount(Account $account): Collection|array
    {
        return $this->whereAccountId($account)->get();
    }

    /**
     * @return Collection
     */
    public function getDailyBookingProperties(): Collection
    {
        return $this->whereDailyBookingType()->get();
    }

    /**
     * @return Collection
     */
    public function getHourlyBookingProperties(): Collection
    {
        return $this->whereHourlyBookingType()->get();
    }
}
