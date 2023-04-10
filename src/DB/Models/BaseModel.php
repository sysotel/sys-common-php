<?php

namespace SYSOTEL\APP\Common\DB\Models;

use Jenssegers\Mongodb\Eloquent\Model;

abstract class BaseModel extends Model
{
    public function setAttribute($key, $value)
    {
        if(!is_null($value)) {
            return parent::setAttribute($key, $value);
        }
        return $this;
    }
}
