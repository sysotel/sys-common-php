<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyContact;


use Jenssegers\Mongodb\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertyProductER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\common\ContactNumber;
use SYSOTEL\APP\Common\DB\Models\common\Email;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertyNearbyPlace\embedded\NearbyPlaceItem;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyContactStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyContactType;

/**
 * @property ?int $id
 * @property ?Account $accountId
 * @property ?int $propertyId
 * @property ?PropertyContactType $type
 * @property ?string $receiverName
 * @property ?Collection $emails
 * @property ?Collection $contactNumbers
 * @property ?PropertyContactStatus $status
 * @property ?bool $printOnBookingVoucher
 */
class PropertyContact extends Model
{
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
