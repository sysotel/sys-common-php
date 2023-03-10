<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\LastMinutePromotion;


use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PromotionType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\Promotion;

/**
 * @ODM\Document
 */
class LastMinutePromotion extends Promotion
{
    /**
     * @var ?LastMinutePromotionDetails
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\LastMinutePromotion\LastMinutePromotionDetails::class)
     */
    private $details;

    /**
     * @return LastMinutePromotionDetails|null
     */
    public function getDetails(): ?LastMinutePromotionDetails
    {
        return $this->details;
    }

    /**
     * @param LastMinutePromotionDetails|null $details
     */
    public function setDetails(?LastMinutePromotionDetails $details): void
    {
        $this->details = $details;
    }

    public function getType(): PromotionType
    {
        return PromotionType::LAST_MINUTE;
    }
}
