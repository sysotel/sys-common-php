<?php

namespace SYSOTEL\APP\Common\DB\Observers;

use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;

class PropertySpaceObserver
{
    /**
     * @param PropertySpace $space
     * @return void
     */
    public function creating(PropertySpace $space): void
    {
        $space->id = NumericIdGenerator::get($space);
    }
}
