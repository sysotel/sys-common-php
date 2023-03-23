<?php

namespace SYSOTEL\APP\Common\DB\Models\common\Geo;

use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\DB\Models\Model;

/**
 * @property ?string $placeId
 * @property ?string $name
 * @property ?string $addr1
 * @property ?string $city
 * @property ?string $province
 * @property ?string $country
 * @property ?string $postalCode
 * @property ?float $longitude
 * @property ?float $latitude
 * @property ?float $phone
 */
class GoogleMapDetails extends EmbeddedModel
{

}
