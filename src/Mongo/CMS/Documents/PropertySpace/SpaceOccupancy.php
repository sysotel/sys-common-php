<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 */
class SpaceOccupancy extends EmbeddedDocument
{
    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $baseCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $maxCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $minAdultCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $maxAdultCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $minChildCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $maxChildCount;

    /**
     * @return array
     */
    public function baseRateCounts(): array
    {
        if($this->baseCount > 0) {
            return range(1, $this->baseCount);
        }
        return [];
    }

    /**
     * @return array
     */
    public function extraAdultRateCounts(): array
    {
        if(($this->maxCount - $this->baseCount) > 0) {
            return range(1, ($this->maxCount - $this->baseCount));
        }
        return [];
    }

    /**
     * @return array
     */
    public function extraChildRateCounts(): array
    {
        return $this->extraAdultRateCounts();
    }
}
