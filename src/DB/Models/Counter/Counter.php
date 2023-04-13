<?php

namespace SYSOTEL\APP\Common\DB\Models\Counter;

use SYSOTEL\APP\Common\DB\Models\Model;

/**
 * @property ?string $id
 * @property ?int $value
*/
class Counter extends Model
{

    protected $collection = 'counters';

    public $incrementing = false;
    public $timestamps = false;
}
