<?php


namespace SYSOTEL\APP\Common\DB\Models\common;

use Carbon\Carbon;
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
 * @property ?PersonName $name
 * @property ?MaritalStatus $maritalStatus
 * @property ?Gender $gender
 * @property ?Carbon $birthDate
 *
 */
class Person extends EmbeddedModel
{
    protected $casts = [
        'maritalStatus' => MaritalStatus::class,
        'gender' => Gender::class
    ];


    public function name(): EmbedsOne
    {
        return $this->embedsOne(PersonName::class);
    }

}
