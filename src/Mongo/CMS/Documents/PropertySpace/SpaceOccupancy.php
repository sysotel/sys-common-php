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
    public $maxExtraCount;

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
