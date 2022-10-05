<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
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
    protected $path;

    /**
     * @var FileSize
     * @ODM\EmbedOne(targetDocument=SYSOTEL\OTA\Common\Mongo\CMS\Documents\common\FileSize::class)
     */
    protected $size;

    /**
     * @var FileExtension
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\FileExtension::class)
     */
    protected $extension;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return File
     */
    public function setPath(string $path): File
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return FileSize
     */
    public function getSize(): FileSize
    {
        return $this->size;
    }

    /**
     * @param FileSize $size
     * @return File
     */
    public function setSize(FileSize $size): File
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return FileExtension
     */
    public function getExtension(): FileExtension
    {
        return $this->extension;
    }

    /**
     * @param FileExtension $extension
     * @return File
     */
    public function setExtension(FileExtension $extension): File
    {
        $this->extension = $extension;
        return $this;
    }
}
