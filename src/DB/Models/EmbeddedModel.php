<?php

namespace SYSOTEL\APP\Common\DB\Models;

use Jenssegers\Mongodb\Eloquent\Model;

abstract class EmbeddedModel extends BaseModel
{
    protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;
}
