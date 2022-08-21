<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\ImageFileExtension;

/**
 * @ODM\EmbeddedDocument
 */
class ImageMetadata extends EmbeddedDocument
{
    /**
     * @var ImageResolution
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\ImageResolution::class)
     */
    public $resolution;

    /**
     * @var ImageFileExtension
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\ImageFileExtension::class)
     */
    public $extension;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $sizeInKB;
}
