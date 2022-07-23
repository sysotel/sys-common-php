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
    public $baseOccupancy;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $maxOccupancy;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $maxExtraBeds;

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
}
