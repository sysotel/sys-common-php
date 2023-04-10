<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyAmenityEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyCancellationPolicyEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyProductEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\Models\Promotions\Promotion;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertyAmenity\PropertyAmenity;
use SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\PropertyCancellationPolicy;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Enums\CMS\PromotionStatus;
use SYSOTEL\APP\Common\Enums\CMS\PromotionType;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PromotionER extends EloquentRepository
{
    /**
     * @param int $promoId
     * @return Collection
     */
    public function getPromotionByPromoId(int $promoId)
    {
        return Promotion::query()
            ->where('promoId', $promoId)
            ->get();
    }

    /**
     * @param int $promoId
     */
    public function getActivePromotionByPromoId(int $promoId)
    {
        $promotion = Promotion::query()
            ->where('promoId', $promoId)
            ->where('status', PromotionStatus::ACTIVE->value)
            ->first();

        return $promotion ?? null;
    }

    public function getBasicPromotionByPromoId(int $promoId)
    {
        $promotion = Promotion::query()
            ->where('promoId', $promoId)
            ->where('type', PromotionType::BASIC->value)
            ->first();
    }

    public function getActiveBasicPromotionByPromoId(int $promoId)
    {
        $promotion = Promotion::query()
            ->where('promoId', $promoId)
            ->where('status', PromotionStatus::ACTIVE->value)
            ->where('type', PromotionType::BASIC->value)
            ->first();

        return $promotion ?? null;
    }

    public function getLastMinutePromotionByPromoId(int $promoId)
    {
        $promotion = Promotion::query()
            ->where('promoId', $promoId)
            ->where('type', PromotionType::LAST_MINUTE->value)
            ->first();
    }

    public function getActiveLastMinutePromotionByPromoId(int $promoId)
    {
        $promotion = Promotion::query()
            ->where('promoId', $promoId)
            ->where('status', PromotionStatus::ACTIVE->value)
            ->where('type', PromotionType::LAST_MINUTE->value)
            ->first();

        return $promotion ?? null;
    }

    public function getEarlyBirdPromotionByPromoId(int $promoId)
    {
        $promotion = Promotion::query()
            ->where('promoId', $promoId)
            ->where('type', PromotionType::EARLY_BIRD->value)
            ->first();
    }

    public function getActiveEarlyBirdPromotionByPromoId(int $promoId)
    {
        $promotion = Promotion::query()
            ->where('promoId', $promoId)
            ->where('status', PromotionStatus::ACTIVE->value)
            ->where('type', PromotionType::EARLY_BIRD->value)
            ->first();

        return $promotion ?? null;
    }


    /**
     * @param int $propertyId
     * @return array
     */
    public function getAllActivePromotionForProperty(int $propertyId): array
    {

        return Promotion::query()
            ->where('propertyId', $propertyId)
            ->where('status', PromotionStatus::ACTIVE->value)
            ->get();

    }

    /**
     * @param int $propertyId
     * @return array
     */
    public function getAllActiveAndInactivePromotionForProperty(int $propertyId): array
    {

        return Promotion::query()
            ->where('propertyId', $propertyId)
            ->where('status', '<>', PromotionStatus::EXPIRED)
            ->get()
            ->toArray();
    }

}
