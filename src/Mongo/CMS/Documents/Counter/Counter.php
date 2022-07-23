<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Counter;

use Delta4op\Mongodb\Documents\Document;
use Delta4op\MongoODM\Traits\CanResolveStringID;
use Delta4op\MongoODM\Traits\HasRepository;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="__counters")
 */
class Counter extends Document
{
    use HasRepository, CanResolveStringID;

    /**
     * @var string
     * @ODM\Id(strategy="none"))
     */
    public $id;

    /**
     * Counter value
     *
     * @var int
     * @ODM\Field(type="int")
     */
    public $value;

    /**
     * @param int $by
     * @return int
     */
    public function increment(int $by = 1): int
    {
        return $this->value += $by;
    }
}
