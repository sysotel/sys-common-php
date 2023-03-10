<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\LastMinutePromotion;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\PromotionsOfferDiscount;

/**
 * @ODM\EmbeddedDocument
 */
class EarlyBirdPromotionDetails extends EmbeddedDocument
{

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected  $windowThresholdInDays;

    /**
     * @var ?PromotionsOfferDiscount
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\PromotionsOfferDiscount::class)
     */
    public $discountForAllUsers;


    /**
     * @var ?PromotionsOfferDiscount
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\PromotionsOfferDiscount::class)
     */
    public $discountForLoggedInUsers;

    /**
     * @return PromotionsOfferDiscount|null
     */
    public function getDiscountForAllUsers(): ?PromotionsOfferDiscount
    {
        return $this->discountForAllUsers;
    }

    /**
     * @param PromotionsOfferDiscount|null $discountForAllUsers
     */
    public function setDiscountForAllUsers(?PromotionsOfferDiscount $discountForAllUsers): void
    {
        $this->discountForAllUsers = $discountForAllUsers;
    }

    /**
     * @return PromotionsOfferDiscount|null
     */
    public function getDiscountForLoggedInUsers(): ?PromotionsOfferDiscount
    {
        return $this->discountForLoggedInUsers;
    }

    /**
     * @param PromotionsOfferDiscount|null $discountForLoggedInUsers
     */
    public function setDiscountForLoggedInUsers(?PromotionsOfferDiscount $discountForLoggedInUsers): void
    {
        $this->discountForLoggedInUsers = $discountForLoggedInUsers;
    }

    /**
     * @return int|null
     */
    public function getWindowThresholdInDays(): ?int
    {
        return $this->windowThresholdInDays;
    }

    /**
     * @param int|null $windowThresholdInDays
     */
    public function setWindowThresholdInDays(?int $windowThresholdInDays): void
    {
        $this->windowThresholdInDays = $windowThresholdInDays;
    }




}
