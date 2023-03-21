<?php

namespace SYSOTEL\APP\Common\DB\Models\common\Geo;

use SYSOTEL\APP\Common\Casts\AsObjectIdString;
use SYSOTEL\APP\Common\DB\Models\BaseModel;
use SYSOTEL\APP\Common\Enums\CMS\Account;

/**
 * @property ?string $id
 * @property ?string $name
 */
class LocationReference extends BaseModel
{
    protected $casts = [
        'id' => AsObjectIdString::class,
    ];
}
