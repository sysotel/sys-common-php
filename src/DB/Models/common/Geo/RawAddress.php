<?php

namespace SYSOTEL\APP\Common\DB\Models\common\Geo;

use SYSOTEL\APP\Common\Casts\AsObjectIdString;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Mongo\CMS\Contracts\AddressContract;

/**
 * @property ?string $fullAddress
 * @property ?string $line1
 * @property ?string $area
 * @property ?string $city
 * @property ?string $state
 * @property ?string $country
 * @property ?int $postalCode
 * @property ?float $longitude
 * @property ?float $latitude
 *
 */
class RawAddress extends EmbeddedModel
{

}
