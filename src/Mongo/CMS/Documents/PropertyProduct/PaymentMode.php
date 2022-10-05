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
     * @var ?PropertyProductPaymentType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyProductPaymentType::class)
     */
    protected $type;

    /**
     * @var ?PartialAmountType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PartialAmountType::class)
     */
    protected $partialAmountType;

    /**
     * @var ?float
     * @ODM\Field(type="float")
     */
    protected $partialAmount;

    /**
     * @return PropertyProductPaymentType|null
     */
    public function getType(): ?PropertyProductPaymentType
    {
        return $this->type;
    }

    /**
     * @param PropertyProductPaymentType|null $type
     * @return PaymentMode
     */
    public function setType(?PropertyProductPaymentType $type): PaymentMode
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return PartialAmountType|null
     */
    public function getPartialAmountType(): ?PartialAmountType
    {
        return $this->partialAmountType;
    }

    /**
     * @param PartialAmountType|null $partialAmountType
     * @return PaymentMode
     */
    public function setPartialAmountType(?PartialAmountType $partialAmountType): PaymentMode
    {
        $this->partialAmountType = $partialAmountType;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPartialAmount(): ?float
    {
        return $this->partialAmount;
    }

    /**
     * @param float|null $partialAmount
     * @return PaymentMode
     */
    public function setPartialAmount(?float $partialAmount): PaymentMode
    {
        $this->partialAmount = $partialAmount;
        return $this;
    }
}
