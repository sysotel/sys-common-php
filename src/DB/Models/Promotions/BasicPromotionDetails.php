<?php

namespace SYSOTEL\APP\Common\DB\Models\Promotions;


use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property ?PromotionOfferDiscount $discountForAllUsers
 * @property ?PromotionOfferDiscount $discountForLoggedInUsers

*/
class BasicPromotionDetails extends EmbeddedModel
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
