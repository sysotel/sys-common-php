<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded;

use SYSOTEL\APP\Common\DB\Helpers\SpaceOccupancyInspector;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property ?int $minCount
 * @property ?int $baseCount
 * @property ?int $maxCount
 * @property ?int $minAdultCount
 * @property ?int $maxAdultCount
 * @property ?int $minChildCount
 * @property ?int $maxChildCount
 */
class SpaceOccupancy extends EmbeddedModel
{
    public function getInspector(): SpaceOccupancyInspector
    {
        return new SpaceOccupancyInspector($this);
    }
}
