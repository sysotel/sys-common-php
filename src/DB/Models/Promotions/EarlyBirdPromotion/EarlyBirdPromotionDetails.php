<?php

namespace SYSOTEL\APP\Common\DB\Models\Promotions\EarlyBirdPromotion;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertySpaceER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\Promotions\Promotion;
use SYSOTEL\APP\Common\DB\Models\Promotions\PromotionOfferDiscount;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\InventorySettings;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;

/**
 * @property ?int $windowThresholdInDays
 * @property ?PromotionOfferDiscount $discountForAllUsers
 * @property ?PromotionOfferDiscount $discountForLoggedInUsers

 */
class EarlyBirdPromotionDetails extends Promotion
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
