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
    protected $resolution;

    /**
     * @var ImageFileExtension
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\ImageFileExtension::class)
     */
    protected $extension;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $sizeInKB;

    /**
     * @return ImageResolution
     */
    public function getResolution(): ImageResolution
    {
        return $this->resolution;
    }

    /**
     * @param ImageResolution $resolution
     * @return ImageMetadata
     */
    public function setResolution(ImageResolution $resolution): ImageMetadata
    {
        $this->resolution = $resolution;
        return $this;
    }

    /**
     * @return ImageFileExtension
     */
    public function getExtension(): ImageFileExtension
    {
        return $this->extension;
    }

    /**
     * @param ImageFileExtension $extension
     * @return ImageMetadata
     */
    public function setExtension(ImageFileExtension $extension): ImageMetadata
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     * @return int
     */
    public function getSizeInKB(): int
    {
        return $this->sizeInKB;
    }

    /**
     * @param int $sizeInKB
     * @return ImageMetadata
     */
    public function setSizeInKB(int $sizeInKB): ImageMetadata
    {
        $this->sizeInKB = $sizeInKB;
        return $this;
    }
}
