<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class BasicPromotionDetails extends EmbeddedDocument
{
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








}
