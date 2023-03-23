<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded;

use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceViewCode;

/**
 * @property ?PropertySpaceViewCode $code
 * @property ?string $name
 * @property ?string $description
*/
class SpaceView extends EmbeddedModel
{
    protected $casts = [
        'code' => PropertySpaceViewCode::class
    ];

    protected static function booted(): void
    {
        static::creating(function (SpaceView $view) {

            if(!$view->name) {
                $view->name = readableConstant($view->code);
            }
        });
    }
}
