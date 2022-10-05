<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 */
class SpaceSize extends EmbeddedDocument
{
    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $areaSqft;

    /**
     * @return int
     */
    public function getAreaSqft(): int
    {
        return $this->areaSqft;
    }

    /**
     * @param int $areaSqft
     * @return SpaceSize
     */
    public function setAreaSqft(int $areaSqft): SpaceSize
    {
        $this->areaSqft = $areaSqft;
        return $this;
    }
}
