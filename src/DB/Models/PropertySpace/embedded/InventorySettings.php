<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded;

use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\CMS\InventoryAccuracy;

/**
 * @property ?InventoryAccuracy $accuracy
 * @property int[] $hourlySlots
*/
class InventorySettings extends EmbeddedModel
{
    protected $casts = [
        'accuracy' => InventoryAccuracy::class
    ];
}
