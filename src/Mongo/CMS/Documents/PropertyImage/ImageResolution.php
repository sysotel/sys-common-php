<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 */
class ImageResolution extends EmbeddedDocument
{
    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $widthInPX;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $heightInPX;

    /**
     * @return int
     */
    public function getWidthInPX(): int
    {
        return $this->widthInPX;
    }

    /**
     * @param int $widthInPX
     * @return ImageResolution
     */
    public function setWidthInPX(int $widthInPX): ImageResolution
    {
        $this->widthInPX = $widthInPX;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeightInPX(): int
    {
        return $this->heightInPX;
    }

    /**
     * @param int $heightInPX
     * @return ImageResolution
     */
    public function setHeightInPX(int $heightInPX): ImageResolution
    {
        $this->heightInPX = $heightInPX;
        return $this;
    }
}
