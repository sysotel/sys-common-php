<?php


namespace SYSOTEL\APP\Common\DB\Models\common;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\CMS\ContactNumberType;
use SYSOTEL\APP\Common\Enums\CountryCode;
use SYSOTEL\APP\Common\Enums\UserType;
use SYSOTEL\APP\Common\Enums\VerificationStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;

/**
 * @property ?ContactNumberType $type
 * @property ?CountryCode $countryCode
 * @property ?string $number

 */
class ContactNumber extends EmbeddedModel
{
    protected $attributes = [
        'type' => ContactNumberType::class,
        'countryCode' => CountryCode::class
    ];

    public function toString(): string
    {
        return "+{$this->countryCode->value} {$this->number}";
    }

    public function __toString(): string
    {
        return $this->toString();
    }

}
