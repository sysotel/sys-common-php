<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Counter;

use Delta4op\Mongodb\Traits\CanResolveStringID;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;

/**
 * @ODM\Document(collection="counters")
 */
class Counter extends BaseDocument
{
    use CanResolveStringID;

    /**
     * @var string
     * @ODM\Id(strategy="none"))
     */
    protected $id;

    /**
     * Counter value
     *
     * @var int
     * @ODM\Field(type="int")
     */
    protected $value;

    /**
     * @param int $by
     * @return int
     */
    public function increment(int $by = 1): int
    {
        return $this->value += $by;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Counter
     */
    public function setId(string $id): Counter
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Counter
     */
    public function setValue(int $value): Counter
    {
        $this->value = $value;
        return $this;
    }

    public static function getNewValue(string $id): int
    {
        $counter = Counter::queryBuilder()
            ->findAndUpdate()
            ->returnNew()
            ->field('_id')->equals($id)
            ->field('value')->inc(1)
            ->getQuery()
            ->execute();

        if(!$counter) {
            abort(500, 'no counter found');
        }

        return $counter->value;
    }
}
