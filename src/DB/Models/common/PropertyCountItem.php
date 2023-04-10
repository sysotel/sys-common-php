<?php


namespace SYSOTEL\APP\Common\DB\Models\common;


use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\CMS\PropertyType;

/**
 * @property ?PropertyType $type
 * @property ?int $count
 *
 */
class PropertyCountItem extends EmbeddedModel
{

    protected $casts=[
        'type' => PropertyType::class
    ];

}
