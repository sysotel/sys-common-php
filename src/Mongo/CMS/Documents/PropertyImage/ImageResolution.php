<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
use function SYSOTEL\APP\Common\Functions\arrayFilter;

/**
 * @ODM\EmbeddedDocument
 */
class ImageResolution extends EmbeddedDocument
{
    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $widthInPX;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $heightInPX;

    /**
     * @inheritDoc
    */
    public function toArray(): array
    {
        return arrayFilter([
            'widthInPX'  => $this->widthInPX,
            'heightInPX' => $this->heightInPX,
        ]);
    }
}
