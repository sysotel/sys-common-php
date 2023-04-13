<?php

namespace SYSOTEL\APP\Common\DB\Models;

use Jenssegers\Mongodb\Eloquent\Model;

abstract class BaseModel extends Model
{
    public function unsetAttribute($key): static
    {
        if(isset($this->attributes[$key])) {
            unset($this->attributes[$key]);
        }

        return $this;
    }

    public function setAttribute($key, $value)
    {
        if(is_null($value)) {
            return $this->unsetAttribute($key);
        }

        return parent::setAttribute($key, $value);
    }
}
