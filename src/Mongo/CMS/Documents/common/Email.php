<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class Email extends EmbeddedDocument
{
    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $id;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->id ?? '';
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
     * @return Email
     */
    public function setId(string $id): Email
    {
        $this->id = $id;
        return $this;
    }
}
