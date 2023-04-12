<?php

namespace SYSOTEL\APP\Common\DB\ArrayGenerators;


use SYSOTEL\APP\Common\DB\Models\Promotions\BasicPromotion;
use SYSOTEL\APP\Common\DB\Models\Promotions\EarlyBirdPromotion\EarlyBirdPromotion;
use SYSOTEL\APP\Common\DB\Models\Promotions\LastMinutePromotion\LastMinutePromotion;
use SYSOTEL\APP\Common\DB\Models\Promotions\Promotion;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;

class PromotionDataGenerator extends ArrayDataGenerator
{
    /**
     * @var Promotion
     */
    protected Promotion $promotion;

    /**
     * @param Promotion $promotion
     */
    protected function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    public static function create(Promotion $promotion): static
    {
        return new static($promotion);
    }

    /**
     * @return PromotionDataGenerator
     */
    public function addBasicDetails(): PromotionDataGenerator
    {
        return $this->appendData([
            'promoId' => $this->promotion->promoId,
            'internalName' => $this->promotion->internalName,
            'displayName' => $this->promotion->displayName,
            'status' => $this->promotion->status,
            'type' => $this->promotion->type,
            'dateRestrictionType' => $this->promotion->dateRestrictionType,
        ]);

    }

    /**
     * @return PromotionDataGenerator
     */
    public function addBookingTimeSpan(): PromotionDataGenerator
    {
        if ($bookingTimeSpan = $this->promotion->bookingTimeSpan) {
            return $this->appendData([
                'bookingTimeSpan' => [
                    'start' => $bookingTimeSpan->start->format('Y-m-d'),
                    'end' => $bookingTimeSpan->end->format('Y-m-d')
                ]
            ]);
        }

        return $this;
    }

    /**
     * @return PromotionDataGenerator
     */
    public function addStayTimeSpan(): PromotionDataGenerator
    {
        if ($stayTimeSpan = $this->promotion->stayTimeSpan) {
            return $this->appendData([
                'stayTimeSpan' => [
                    'start' => $stayTimeSpan->start->format('Y-m-d'),
                    'end' => $stayTimeSpan->end->format('Y-m-d')
                ]
            ]);
        }

        return $this;
    }

    /**
     * @return PromotionDataGenerator
     */
    public function addDetails(): PromotionDataGenerator
    {
        $data = null;

        if ($this->promotion instanceof BasicPromotion && $details = $this->promotion->details) {
            $data = [
                'discountForAllUsers' => [
                    'type' => $details->discountForAllUsers->type,
                    'value' => $details->discountForAllUsers->value
                ],
                'discountForLoggedInUsers' => [
                    'type' => $details->discountForLoggedInUsers->type,
                    'value' => $details->discountForLoggedInUsers->value
                ],
            ];
        } else if ($this->promotion instanceof LastMinutePromotion && $details = $this->promotion->details) {
            $data = [
                'discountForAllUsers' => [
                    'type' => $details->discountForAllUsers->type,
                    'value' => $details->discountForAllUsers->value
                ],
                'discountForLoggedInUsers' => [
                    'type' => $details->discountForLoggedInUsers->type,
                    'value' => $details->discountForLoggedInUsers->value
                ],
                'windowThresholdInDays' => $details->windowThresholdInDays
            ];
        } else if ($this->promotion instanceof EarlyBirdPromotion && $details = $this->promotion->details) {
            $data = [
                'discountForAllUsers' => [
                    'type' => $details->discountForAllUsers->type,
                    'value' => $details->discountForAllUsers->value
                ],
                'discountForLoggedInUsers' => [
                    'type' => $details->discountForLoggedInUsers->type,
                    'value' => $details->discountForLoggedInUsers->value
                ],
                'windowThresholdInDays' => $details->windowThresholdInDays
            ];
        }

        return $this->appendData(['details' => $data]);
    }
}
