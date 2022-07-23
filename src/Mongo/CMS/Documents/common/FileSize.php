<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\FileSizeUnit;

/**
 * @ODM\EmbeddedDocument
 */
class FileSize extends EmbeddedDocument
{
    /**
     * @var float
     * @ODM\Field(type="double")
     */
    public $value;

    /**
     * @var FileSizeUnit
     * @ODM\Field(type="float", enumType=SYSOTEL\APP\Common\Enums\FileSizeUnit::class)
     */
    public $unit;
}
