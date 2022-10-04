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
    public $areaSqft;
//
//    /**
//     * @var float
//     * @ODM\Field(type="float")
//     */
//    public $value;
//
//    /**
//     * @var SpaceSize
//     * @ODM\Field(type="string")
//     */
//    public $unit;
}
