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
     * @var string
     * @ODM\Field(type="string")
     */
    public $key;

    /**
     * @var mixed
     * @ODM\Field(type="raw")
     */
    public $value;
}
