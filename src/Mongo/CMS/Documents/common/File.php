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
     * @var ?string
     * @ODM\Field(type="string")
     */
    public $path;

    /**
     * @var ?FileSize
     * @ODM\EmbedOne(targetDocument=SYSOTEL\OTA\Common\Mongo\CMS\Documents\common\FileSize::class)
     */
    public $size;

    /**
     * @var ?FileExtension
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\FileExtension::class)
     */
    public $extension;

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string|null $path
     * @return File
     */
    public function setPath(?string $path): File
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return FileSize|null
     */
    public function getSize(): ?FileSize
    {
        return $this->size;
    }

    /**
     * @param FileSize|null $size
     * @return File
     */
    public function setSize(?FileSize $size): File
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return FileExtension|null
     */
    public function getExtension(): ?FileExtension
    {
        return $this->extension;
    }

    /**
     * @param FileExtension|null $extension
     * @return File
     */
    public function setExtension(?FileExtension $extension): File
    {
        $this->extension = $extension;
        return $this;
    }
}
