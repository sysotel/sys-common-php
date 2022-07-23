<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use function SYSOTEL\APP\Common\Functions\arrayFilter;

/**
 * @ODM\EmbeddedDocument
 */
class ProductRateThresholds extends EmbeddedDocument
{
    /**
     * @var float
     * @ODM\Field(type="float")
     */
    public $lowest;

    /**
     * @var float
     * @ODM\Field(type="float")
     */
    public $highest;
}
