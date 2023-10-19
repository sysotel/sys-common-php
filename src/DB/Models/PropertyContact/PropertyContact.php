<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyContact;


use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use SYSOTEL\APP\Common\DB\Models\common\ContactNumber;
use SYSOTEL\APP\Common\DB\Models\common\Email;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertyContact\embedded\ContactEmail;
use SYSOTEL\APP\Common\DB\Models\PropertyContact\embedded\ContactName;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyContactStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyContactType;

/**
 * @property ?int $id
 * @property ?Account $accountId
 * @property ?int $propertyId
 * @property ?PropertyContactType $type
 * @property ?ContactName $name
 * @property ?ContactEmail $emails
 * @property ?ContactNumber $contactNumbers
 * @property ?PropertyContactStatus $status
 * @property ?bool $printOnBookingVoucher
 */
class PropertyContact extends Model
{
    protected $collection = 'propertyContacts';
    protected $casts = [
        'status' => PropertyContactStatus::class,
    ];

    protected $attributes = [
        'status'       => PropertyContactStatus::ACTIVE,
        'printOnBookingVoucher' => false
    ];

    public function contactNumbers(): EmbedsMany
    {
        return $this->embedsMany(ContactNumber::class);
    }

    public function emails(): EmbedsMany
    {
        return $this->embedsMany(Email::class);
    }



}
