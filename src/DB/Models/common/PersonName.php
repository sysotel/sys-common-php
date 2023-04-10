<?php


namespace SYSOTEL\APP\Common\DB\Models\common;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\Enums\FileExtension;
use SYSOTEL\APP\Common\Enums\PersonTitle;
use SYSOTEL\APP\Common\Enums\UserType;
use SYSOTEL\APP\Common\Enums\VerificationStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;

/**
 * @property ?PersonTitle $title
 * @property ?string $firstName
 * @property ?string $lastName
 * @property ?string $fullName
 */
class PersonName extends EmbeddedModel
{
    protected $casts = [
        'title' => PersonTitle::class,
    ];

    public function setName(string $fn, string $ln, ?string $title = null)
    {
        $this->title = $title;
        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->fullName = $fn . ' ' . $ln;
    }

}
