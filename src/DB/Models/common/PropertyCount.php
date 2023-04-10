<?php


namespace SYSOTEL\APP\Common\DB\Models\common;

use Carbon\Carbon;
use Jenssegers\Mongodb\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\Enums\FileExtension;
use SYSOTEL\APP\Common\Enums\Gender;
use SYSOTEL\APP\Common\Enums\MaritalStatus;
use SYSOTEL\APP\Common\Enums\UserType;
use SYSOTEL\APP\Common\Enums\VerificationStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;

/**
 * @property ?Collection $items
 * @property ?int $count
 *
 */
class PropertyCount extends EmbeddedModel
{
    protected $attributes = [
        'count' => 0
    ];


    public function items(): EmbedsMany
    {
        return $this->embedsMany(PersonName::class);
    }

}
