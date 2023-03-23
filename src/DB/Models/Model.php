<?php

namespace SYSOTEL\APP\Common\DB\Models;

class Model extends \Jenssegers\Mongodb\Eloquent\Model
{
    protected $connection = 'cms';

    const CREATED_AT = 'createdAt';

    const UPDATED_AT = 'updatedAt';

    public function getCollection(): string
    {
        return $this->getTable();
    }
}
