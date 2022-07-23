<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use function SYSOTEL\APP\Common\Functions\arrayFilter;
use function SYSOTEL\APP\Common\Functions\toArrayOrNull;

/**
 * @ODM\EmbeddedDocument
 */
class ImageMetadata extends EmbeddedDocument
{
    /**
     * @var ImageResolution
     * @ODM\EmbedOne (targetDocument=ImageResolution::class)
     */
    public $resolution;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $extension;
    public const EXT_JPG = 'jpg';
    public const EXT_JPEG = 'jpeg';
    public const EXT_PNG = 'pbg';
    public const EXT_WEBP = 'webp';

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $sizeInKB;


    /**
     * @inheritDoc
    */
    public function toArray(): array
    {
        return arrayFilter([
            'filePath'   => $this->filePath,
            'ratio'      => $this->ratio,
            'size'       => $this->size,
            'resolution' => toArrayOrNull($this->resolution),
            'extension'  => $this->extension,
            'sizeInKB'   => $this->sizeInKB,
        ]);
    }
}
