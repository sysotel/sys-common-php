<?php

namespace SYSOTEL\APP\Common\DB\Models\Promotions\LastMinutePromotion;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\Promotions\Promotion;
use SYSOTEL\APP\Common\DB\Models\Promotions\PromotionOfferDiscount;

/**
 * @property ?int $windowThresholdInDays
 * @property ?PromotionOfferDiscount $discountForAllUsers
 * @property ?PromotionOfferDiscount $discountForLoggedInUsers

 */
class LastMinutePromotionDetails extends Promotion
{
    public function discountForAllUsers(): EmbedsOne
    {
        return $this->embedsOne(PromotionOfferDiscount::class);
    }

    public function discountForLoggedInUsers(): EmbedsOne
    {
        return $this->embedsOne(PromotionOfferDiscount::class);
    }

}
