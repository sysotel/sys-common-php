<?php


namespace SYSOTEL\APP\Common\DB\Models\PropertyContact\embedded;

use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\Enums\CMS\PropertyContactType;
use SYSOTEL\APP\Common\Enums\PersonTitle;

/**
 * @property ?PropertyContactType $type
 * @property ?string $countryCode
 * @property ?string $number
 * @property ?string $value
 *
 */
class ContactNumber extends Model
{

}
