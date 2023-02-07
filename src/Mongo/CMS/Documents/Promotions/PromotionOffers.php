<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\OffersSubject;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAutoIncrementId;

/**
 * @ODM\EmbeddedDocument
 */
class PromotionOffers extends EmbeddedDocument
{
    use CanResolveIntegerID, HasAutoIncrementId, HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var ?OffersSubject
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\OffersSubject::class)
     */
    protected $subject;

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
     * @return OffersSubject|null
     */
    public function getSubject(): ?OffersSubject
    {
        return $this->subject;
    }

    /**
     * @param OffersSubject|null $subject
     * @return PromotionOffers
     */
    public function setSubject(?OffersSubject $subject): PromotionOffers
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return PromotionsOfferDiscount|null
     */
    public function getDiscountForAllUsers(): ?PromotionsOfferDiscount
    {
        return $this->discountForAllUsers;
    }

    /**
     * @param PromotionsOfferDiscount|null $discountForAllUsers
     * @return PromotionOffers
     */
    public function setDiscountForAllUsers(?PromotionsOfferDiscount $discountForAllUsers): PromotionOffers
    {
        $this->discountForAllUsers = $discountForAllUsers;
        return $this;
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
     * @return PromotionOffers
     */
    public function setDiscountForLoggedInUsers(?PromotionsOfferDiscount $discountForLoggedInUsers): PromotionOffers
    {
        $this->discountForLoggedInUsers = $discountForLoggedInUsers;
        return $this;
    }

}
