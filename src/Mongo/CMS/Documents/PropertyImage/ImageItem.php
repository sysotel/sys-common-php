<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;

/**
 * @ODM\EmbeddedDocument
 */
class ImageItem extends EmbeddedDocument
{
    /**
     * @var PropertyImageTarget
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget::class)
     */
    public $target;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $filePath;

    /**
     * @var ImageMetadata
     * @ODM\EmbedOne(targetDocument=ImageMetadata::class)
     */
    public $meta;
}
