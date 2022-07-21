<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
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
    public $type;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $count;
}
