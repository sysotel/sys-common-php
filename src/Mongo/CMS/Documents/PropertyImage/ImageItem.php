<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageVersion;

/**
 * @ODM\EmbeddedDocument
 */
class ImageItem extends EmbeddedDocument
{
    /**
     * @var PropertyImageVersion
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyImageVersion::class)
     */
    protected $version;

    /**
     * @var string`
     * @ODM\Field(type="string")
     */
    protected $filePath;

    /**
     * @var ImageMetadata
     * @ODM\EmbedOne(targetDocument=ImageMetadata::class)
     */
    protected $meta;

    /**
     * @return PropertyImageVersion
     */
    public function getVersion(): PropertyImageVersion
    {
        return $this->version;
    }

    /**
     * @param PropertyImageVersion $version
     * @return ImageItem
     */
    public function setVersion(PropertyImageVersion $version): ImageItem
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     * @return ImageItem
     */
    public function setFilePath(string $filePath): ImageItem
    {
        $this->filePath = $filePath;
        return $this;
    }

    /**
     * @return ImageMetadata
     */
    public function getMeta(): ImageMetadata
    {
        return $this->meta;
    }

    /**
     * @param ImageMetadata $meta
     * @return ImageItem
     */
    public function setMeta(ImageMetadata $meta): ImageItem
    {
        $this->meta = $meta;
        return $this;
    }
}
