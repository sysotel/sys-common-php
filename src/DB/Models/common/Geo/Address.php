<?php

namespace SYSOTEL\APP\Common\DB\Models\common\Geo;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\Enums\CMS\Account;

/**
 * @property ?string $fullAddress
 * @property ?string $line1
 * @property ?LocationReference $area
 * @property ?LocationReference $city
 * @property ?LocationReference $state
 * @property ?LocationReference $country
 * @property ?string $postalCode
 * @property ?GoogleMapDetails $googleMapDetails
 * @property ?GeoPoint $geoPoint
 *
 */
class Address extends EmbeddedModel
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

    public function googleMapDetails(): EmbedsOne
    {
        return $this->embedsOne(GoogleMapDetails::class);
    }

    public function geoPoint(): EmbedsOne
    {
        return $this->embedsOne(GeoPoint::class);
    }

    /**
     * @return string
     */
    public function generateFullAddress(): string
    {
        return $this->fullAddress = "{$this->line1}, {$this->area->name}, {$this->city->name}, {$this->state->name}, {$this->country->name} - {$this->postalCode}";
    }


    public function getAddressLine(): ?string
    {
        return $this->line1 ?? null;
    }

    public function getAreaName(): ?string
    {
        return $this->area->name ?? null;
    }

    public function getCityName(): ?string
    {
        return $this->city->name ?? null;
    }

    public function getStateName(): ?string
    {
        return $this->state->name ?? null;
    }

    public function getCountryName(): ?string
    {
        return $this->country->name ?? null;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode ?? null;
    }

    /**
     * @return string
     */
    public function areaCityString(): string
    {
        return "{$this->area->name}, {$this->city->name}";
    }

    /**
     * @return string
     */
    public function cityStateString(): string
    {
        return "{$this->city->name}, {$this->state->name}";
    }

    /**
     * @return string
     */
    public function cityStateCountryString(): string
    {
        return "{$this->cityStateString()}, {$this->country->name}";
    }
}
