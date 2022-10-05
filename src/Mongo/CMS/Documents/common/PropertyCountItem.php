<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\PropertyType;

/**
 * @ODM\EmbeddedDocument
 */
class PropertyCountItem extends EmbeddedDocument
{
    /**
     * @var PropertyType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyType::class)
     */
    protected $type;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $count;

    /**
     * @return PropertyType
     */
    public function getType(): PropertyType
    {
        return $this->type;
    }

    /**
     * @param PropertyType $type
     * @return PropertyCountItem
     */
    public function setType(PropertyType $type): PropertyCountItem
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return PropertyCountItem
     */
    public function setCount(int $count): PropertyCountItem
    {
        $this->count = $count;
        return $this;
    }
}
