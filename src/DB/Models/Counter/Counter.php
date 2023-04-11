<?php

namespace SYSOTEL\APP\Common\DB\Models\Counter;

use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property ?string $id
 * @property ?int $value
*/
class Counter extends EmbeddedModel
{

    protected $collection = 'counters';

    public $incrementing = false;
    public $timestamps = false;
}
