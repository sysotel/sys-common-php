<?php

namespace SYSOTEL\APP\Common\DB\Models\common\Geo;

use SYSOTEL\APP\Common\Casts\AsObjectIdString;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property ?string $id
 * @property ?string $name
 */
class LocationReference extends EmbeddedModel
{
    protected $casts = [
        'id' => AsObjectIdString::class,
    ];
}
