<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\EarlyBirdPromotion;


use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PromotionType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\LastMinutePromotion\EarlyBirdPromotionDetails;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\Promotion;

/**
 * @ODM\Document
 */
class EarlyBirdPromotion extends Promotion
{
    /**
     * @var ?EarlyBirdPromotionDetails
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\LastMinutePromotion\LastMinutePromotionDetails::class)
     */
    private $details;

    /**
     * @return EarlyBirdPromotionDetails|null
     */
    public function getDetails(): ?EarlyBirdPromotionDetails
    {
        return $this->details;
    }

    /**
     * @param EarlyBirdPromotionDetails|null $details
     */
    public function setDetails(?EarlyBirdPromotionDetails $details): void
    {
        $this->details = $details;
    }


    public function getType(): PromotionType
    {
        return PromotionType::EARLY_BIRD;
    }
}
