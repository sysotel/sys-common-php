<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\PromotionCategory;
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
            'category' => PromotionCategory::PROMOTION->value
        ], [
            'createdAt' => -1
        ]);
    }

    /**
     * @param int $promoId
     * @return Promotion
     */
    public function getAllPromotionByPromoId(int $promoId): Promotion{
        return $this->findOneBy([
            'promoId' => $promoId,
            'status' => PromotionStatus::ACTIVE,
        ], [
            'createdAt' => -1
        ]);
    }


    /**
     * @param int $promoId
     * @return Promotion
     */
    public function getPromoCodeByPromoId(int $promoId): Promotion{
        return $this->findOneBy([
            'promoId' => $promoId,
            'category' => PromotionCategory::PROMO_CODE->value
        ], [
            'createdAt' => -1
        ]);
    }

    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getActivePromoCodeByPromoId(int $promoId): ?Promotion{

        $promoCode = $this->getPromoCodeByPromoId($promoId);

        if($promoCode && $promoCode->getStatus() == PromotionStatus::ACTIVE->value){
            return $promoCode;
        }

        return null;
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
     * @return Promotion|null
     */
    public function getBasicPromotionByPromoId(int $promoId): ?Promotion
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
    public function getBasicPromotionByPromoIdAndCategory(int $promoId): ?Promotion
    {
        return $this->findOneBy([
            'promoId' => $promoId,
            'type' => PromotionType::BASIC->value,
            'category' => PromotionCategory::PROMOTION->value
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

    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getLastMinutePromotionByPromoId(int $promoId): ?Promotion
    {
        return $this->findOneBy([
            'promoId' => $promoId,
            'type' => PromotionType::LAST_MINUTE->value
        ], [
            'createdAt' => -1
        ]);
    }

    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getLastMinutePromotionByPromoIdAndCategory(int $promoId): ?Promotion
    {
        return $this->findOneBy([
            'promoId' => $promoId,
            'type' => PromotionType::LAST_MINUTE->value,
            'category' => PromotionCategory::PROMOTION->value
        ], [
            'createdAt' => -1
        ]);
    }


    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getActiveLastMinutePromotionByPromoId(int $promoId): ?Promotion{

        $promotion = $this->getLastMinutePromotionByPromoId($promoId);

        if($promotion && $promotion->getStatus() == PromotionStatus::ACTIVE->value){
            return $promotion;
        }

        return null;
    }


    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getEarlyBirdPromotionByPromoId(int $promoId): ?Promotion
    {
        return $this->findOneBy([
            'promoId' => $promoId,
            'type' => PromotionType::EARLY_BIRD->value
        ], [
            'createdAt' => -1
        ]);
    }

    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getEarlyBirdPromotionByPromoIdAndCategory(int $promoId): ?Promotion
    {
        return $this->findOneBy([
            'promoId' => $promoId,
            'type' => PromotionType::EARLY_BIRD->value,
            'category' => PromotionCategory::PROMOTION->value
        ], [
            'createdAt' => -1
        ]);
    }

    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getBasicPromotionByPromoIdAndCategoryPromoCode(int $promoId): ?Promotion
    {
        return $this->findOneBy([
            'promoId' => $promoId,
            'type' => PromotionType::BASIC->value,
            'category' => PromotionCategory::PROMO_CODE->value
        ], [
            'createdAt' => -1
        ]);
    }




    /**
     * @param int $promoId
     * @return Promotion|null
     */
    public function getActiveEarlyBirdPromotionByPromoId(int $promoId): ?Promotion{

        $promotion = $this->getEarlyBirdPromotionByPromoId($promoId);

        if($promotion && $promotion->getStatus() == PromotionStatus::ACTIVE->value){
            return $promotion;
        }

        return null;
    }

    /**
     * @param int $propertyId
     * @return array
     */
    public function getAllActivePromotionForProperty(int $propertyId): array{

        return $this->findBy([
            'propertyId' => $propertyId,
            'status' => PromotionStatus::ACTIVE,
            'category' => PromotionCategory::PROMOTION->value
        ]);

    }

    /**
     * @param int $propertyId
     * @return array
     */
    public function getAllActiveAndInactivePromotionForProperty(int $propertyId): array{

        return $this->findBy([
            'propertyId' => $propertyId,
            'status' => ['$ne' => PromotionStatus::EXPIRED],
            'category' => PromotionCategory::PROMOTION->value
        ]);

    }

    /**
     * @param int $propertyId
     * @return array
     */
    public function getAllActiveAndInactivePromoCodeForProperty(int $propertyId): array{

        return $this->findBy([
            'propertyId' => $propertyId,
            'status' => ['$ne' => PromotionStatus::EXPIRED],
            'category' => PromotionCategory::PROMO_CODE->value
        ]);

    }

    /**
     * @param int $propertyId
     * @return Promotion|null
     */
    public function getActivePromoCodeForProperty(int $propertyId): ?Promotion{

        return $this->findOneBy([
            'propertyId' => $propertyId,
            'status' => ['$ne' => PromotionStatus::EXPIRED],
            'category' => PromotionCategory::PROMO_CODE->value
        ]);

    }




}
