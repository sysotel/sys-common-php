<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\InventoryFormatType;

/**
 * @ODM\EmbeddedDocument
 */
class SpaceInventoryFormat extends EmbeddedDocument
{
    /**
     * @var InventoryFormatType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\InventoryFormatType::class)
     */
    public $type;
}
