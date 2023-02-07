<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PromotionDiscountType;

/**
 * @ODM\EmbeddedDocument
 */
class PromotionsOfferDiscount extends EmbeddedDocument
{
    /**
     * @var ?PromotionDiscountType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PromotionDiscountType::class)
     */
    public $type;

    /**
     * @var ?float
     * @ODM\Field(type="float")
     */
    public $value;

    /**
     * @return PromotionDiscountType|null
     */
    public function getType(): ?PromotionDiscountType
    {
        return $this->type;
    }

    /**
     * @param PromotionDiscountType|null $type
     * @return PromotionsOfferDiscount
     */
    public function setType(?PromotionDiscountType $type): PromotionsOfferDiscount
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float|null $value
     * @return PromotionsOfferDiscount
     */
    public function setValue(?float $value): PromotionsOfferDiscount
    {
        $this->value = $value;
        return $this;
    }



}
