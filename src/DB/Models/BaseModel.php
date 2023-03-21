<?php

namespace SYSOTEL\APP\Common\DB\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class BaseModel extends Model
{
    protected $connection = 'cms';
}
