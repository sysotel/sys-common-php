<?php

namespace SYSOTEL\APP\Common\DB\Models;

abstract class Model extends BaseModel
{
    protected $connection = 'cms';

    const CREATED_AT = 'createdAt';

    const UPDATED_AT = 'updatedAt';

    public function getCollection(): string
    {
        return $this->getTable();
    }
}
