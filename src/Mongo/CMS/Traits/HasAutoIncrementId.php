<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use Delta4op\MongoODM\Traits\CanResolveIntegerID;

trait HasAutoIncrementId
{
    /**
     * @var int
     * @ODM\Id(strategy="CUSTOM", type="int", options={"class"=SYSOTEL\APP\Common\Mongo\CMS\StorageStrategies\AutoIncrementID::class }))
     */
    public $id;
}
