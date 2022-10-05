<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 */
class KeyValueItem extends EmbeddedDocument
{
    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    public $key;

    /**
     * @var ?mixed
     * @ODM\Field(type="raw")
     */
    public $value;

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     * @return KeyValueItem
     */
    public function setKey(?string $key): KeyValueItem
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param mixed|null $value
     * @return KeyValueItem
     */
    public function setValue(mixed $value): KeyValueItem
    {
        $this->value = $value;
        return $this;
    }
}
