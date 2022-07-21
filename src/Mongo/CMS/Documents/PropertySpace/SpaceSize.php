<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
use function SYSOTEL\APP\Common\Functions\arrayFilter;

/**
 * @ODM\EmbeddedDocument
 */
class SpaceSize extends EmbeddedDocument
{
    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $areaSQFT;
}
