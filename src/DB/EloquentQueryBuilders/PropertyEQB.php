<?php

namespace SYSOTEL\APP\Common\DB\EloquentQueryBuilders;

use Jenssegers\Mongodb\Eloquent\Builder;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyBookingType;

class PropertyEQB extends Builder
{
    /**
     * @param Account $accountId
     * @return PropertyEQB
     */
    public function whereAccountId(Account $accountId): PropertyEQB
    {
        return $this->where('accountId', $accountId);
    }

    /**
     * @return PropertyEQB
     */
    public function whereDailyBookingType(): PropertyEQB
    {
        return $this->where('allowedBookingTypes', PropertyBookingType::DAILY);
    }

    /**
     * @return PropertyEQB
     */
    public function whereHourlyBookingType(): PropertyEQB
    {
        return $this->where('allowedBookingTypes', PropertyBookingType::HOURLY);
    }

    /**
     * @param string $slug
     * @return PropertyEQB
     */
    public function whereSlug(string $slug): PropertyEQB
    {
        return $this->where('slug', $slug);
    }

    /**
     * @param string $slug
     * @return PropertyEQB
     */
    public function whereAccountSlug(string $slug): PropertyEQB
    {
        return $this->where('accountSlug', $slug);
    }
}
