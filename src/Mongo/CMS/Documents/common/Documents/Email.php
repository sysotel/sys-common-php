<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class Email extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $id;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->id;
    }
}
