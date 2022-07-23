<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use function SYSOTEL\APP\Common\Functions\arrayFilter;

/**
 * @ODM\EmbeddedDocument
 */
class PaymentMode extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $type;
    public const TYPE_PAY_NOW = 'PAY_NOW';
    public const TYPE_PAY_AT_PROPERTY = 'PAY_AT_PROPERTY';
    public const TYPE_PAY_PARTIAL = 'PAY_PARTIAL';
    public const TYPE_LATER = 'PAY_LATER';

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $payPartialAmountType;
    public const PAY_PARTIAL_AMOUNT_TYPE_FLAT = 'FLAT';
    public const PAY_PARTIAL_AMOUNT_TYPE_PERC = 'PERC';

    /**
     * @var float
     * @ODM\Field(type="float")
     */
    public $payPartialAmount;
}
