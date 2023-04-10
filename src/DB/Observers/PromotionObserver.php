<?php

namespace SYSOTEL\APP\Common\DB\Observers;

use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\Promotions\Promotion;

class PromotionObserver
{
    /**
     * @param Promotion $promotion
     * @return void
     */
    public function creating(Promotion $promotion): void
    {
        $promotion->id = NumericIdGenerator::get($promotion);
    }
}
