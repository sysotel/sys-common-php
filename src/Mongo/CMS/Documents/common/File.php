<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\FileExtension;

/**
 * @ODM\EmbeddedDocument
 */
class File extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $path;

    /**
     * @var FileSize
     * @ODM\EmbedOne(targetDocument=SYSOTEL\OTA\Common\Mongo\CMS\Documents\common\FileSize::class)
     */
    public $size;

    /**
     * @var FileExtension
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\FileExtension::class)
     */
    public $extension;
}
