<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\PromotionStatus;
use SYSOTEL\APP\Common\Enums\CMS\PromotionType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\Promotion;

class PromotionRepository extends DocumentRepository
{

    /**
     * @param int $promoId
     * @return Promotion
     */
    public function getPromotionByPromoId(int $promoId): Promotion{
        return $this->findOneBy([
            'promoId' => $promoId,
        ], [
            'createdAt' => -1
        ]);
    }


    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getActivePromotionByPromoId(int $promoId): ?Promotion{

        $promotion = $this->getPromotionByPromoId($promoId);

        if($promotion && $promotion->getStatus() == PromotionStatus::ACTIVE->value){
            return $promotion;
        }

        return null;
    }


    /**
     * @param int $promoId
     * @return Promotion
     */
    public function getBasicPromotionByPromoId(int $promoId): Promotion
    {
        return $this->findOneBy([
            'promoId' => $promoId,
            'type' => PromotionType::BASIC->value
        ], [
            'createdAt' => -1
        ]);
    }

    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getActiveBasicPromotionByPromoId(int $promoId): ?Promotion{

        $promotion = $this->getBasicPromotionByPromoId($promoId);

        if($promotion && $promotion->getStatus() == PromotionStatus::ACTIVE->value){
            return $promotion;
        }

        return null;
    }

}
