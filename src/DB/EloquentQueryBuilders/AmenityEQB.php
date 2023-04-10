<?php

namespace SYSOTEL\APP\Common\DB\EloquentQueryBuilders;

use Jenssegers\Mongodb\Eloquent\Builder;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;

class AmenityEQB extends Builder
{
    public function whereTarget(AmenityTarget $target): AmenityEQB
    {
        return $this->where('target', $target);
    }

}
