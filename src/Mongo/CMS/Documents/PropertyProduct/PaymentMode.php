<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\PartialAmountType;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductPaymentType;

/**
 * @ODM\EmbeddedDocument
 */
class PaymentMode extends EmbeddedDocument
{
    /**
     * @var PropertyProductPaymentType
     * @ODM\Field(type="int", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyProductPaymentType::class)
     */
    public $type;

    /**
     * @var PartialAmountType
     * @ODM\Field(type="int", enumType=SYSOTEL\APP\Common\Enums\CMS\PartialAmountType::class)
     */
    public $partialAmountType;

    /**
     * @var float
     * @ODM\Field(type="float")
     */
    public $partialAmount;
}
