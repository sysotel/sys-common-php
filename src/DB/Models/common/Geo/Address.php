<?php

namespace SYSOTEL\APP\Common\DB\Models\common\Geo;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\BaseModel;
use SYSOTEL\APP\Common\Enums\CMS\Account;

/**
 * @property ?string $fullAddress
 * @property ?string $line1
 * @property ?LocationReference $area
 * @property ?LocationReference $city
 * @property ?LocationReference $state
 * @property ?LocationReference $country
 * @property ?string $postalCode
 */
class Address extends BaseModel
{
    protected $casts = [
        'accountId' => Account::class,
    ];

    public function area(): EmbedsOne
    {
        return $this->embedsOne(LocationReference::class);
    }

    public function city(): EmbedsOne
    {
        return $this->embedsOne(LocationReference::class);
    }

    public function state(): EmbedsOne
    {
        return $this->embedsOne(LocationReference::class);
    }

    public function country(): EmbedsOne
    {
        return $this->embedsOne(LocationReference::class);
    }
}
