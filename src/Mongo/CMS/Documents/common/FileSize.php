<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\FileSizeUnit;

/**
 * @ODM\EmbeddedDocument
 */
class FileSize extends EmbeddedDocument
{
    /**
     * @var float
     * @ODM\Field(type="double")
     */
    protected $value;

    /**
     * @var FileSizeUnit
     * @ODM\Field(type="float", enumType=SYSOTEL\APP\Common\Enums\FileSizeUnit::class)
     */
    protected $unit;

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return FileSize
     */
    public function setValue(float $value): FileSize
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return FileSizeUnit
     */
    public function getUnit(): FileSizeUnit
    {
        return $this->unit;
    }

    /**
     * @param FileSizeUnit $unit
     * @return FileSize
     */
    public function setUnit(FileSizeUnit $unit): FileSize
    {
        $this->unit = $unit;
        return $this;
    }
}
