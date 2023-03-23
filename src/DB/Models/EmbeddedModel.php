<?php

namespace SYSOTEL\APP\Common\DB\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class EmbeddedModel extends Model
{
    protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;
}
