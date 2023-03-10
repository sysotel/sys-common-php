<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\BasicPromotion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\EarlyBirdPromotion\EarlyBirdPromotion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\LastMinutePromotion\LastMinutePromotion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\Promotion;

class PromotionDataGenerator
{
    use Helpers;

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

    /**
     * @return PromotionDataGenerator
     */
    public function addBasicDetails(): PromotionDataGenerator
    {
        return $this->appendData([
            'promoId' => $this->promotion->getPromoId(),
            'internalName' => $this->promotion->getInternalName(),
            'displayName' => $this->promotion->getDisplayName(),
            'status' => $this->promotion->getStatus(),
            'type' => $this->promotion->getType(),
            'dateRestrictionType' => $this->promotion->getDateRestrictionType(),
        ]);

    }

    /**
 * @return PromotionDataGenerator
 */
    public function addBookingTimeSpan(): PromotionDataGenerator
    {
        if($bookingTimeSpan = $this->promotion->getBookingTimeSpan()){
            return $this->appendData([
                'bookingTimeSpan' => [
                    'start' => $bookingTimeSpan->getStart()->format('Y-m-d'),
                    'end' => $bookingTimeSpan->getEnd()->format('Y-m-d')
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
        if($stayTimeSpan = $this->promotion->getStayTimeSpan()){
            return $this->appendData([
                'stayTimeSpan' => [
                    'start' => $stayTimeSpan->getStart()->format('Y-m-d'),
                    'end' => $stayTimeSpan->getEnd()->format('Y-m-d')
                ]
            ]);
        }

        return $this;
    }

    /**
     * @return PromotionDataGenerator
     */
    public function addBasicPromotionDetails(): PromotionDataGenerator
    {
        $data = null;

        if($this->promotion instanceof BasicPromotion && $details = $this->promotion->getDetails()) {
            $data = [
                'discountForAllUsers' => [
                    'type' => $details->getDiscountForAllUsers()->getType(),
                    'value' => $details->getDiscountForAllUsers()->getValue()
                ],
                'discountForLoggedInUsers' => [
                    'type' => $details->getDiscountForLoggedInUsers()->getType(),
                    'value' => $details->getDiscountForLoggedInUsers()->getValue()
                ],
            ];
        }

        return $this->appendData(['details' => $data]);
    }

    /**
     * @return PromotionDataGenerator
     */
    public function addLastMinutePromotionDetails(): PromotionDataGenerator
    {
        $data = null;

        if($this->promotion instanceof LastMinutePromotion && $details = $this->promotion->getDetails()) {
            $data = [
                'discountForAllUsers' => [
                    'type' => $details->getDiscountForAllUsers()->getType(),
                    'value' => $details->getDiscountForAllUsers()->getValue()
                ],
                'discountForLoggedInUsers' => [
                    'type' => $details->getDiscountForLoggedInUsers()->getType(),
                    'value' => $details->getDiscountForLoggedInUsers()->getValue()
                ],
                'windowThresholdInDays' => $details->getWindowThresholdInDays()
            ];
        }

        return $this->appendData(['details' => $data]);
    }

    /**
     * @return PromotionDataGenerator
     */
    public function addEarlyBirdPromotionDetails(): PromotionDataGenerator
    {
        $data = null;

        if($this->promotion instanceof EarlyBirdPromotion && $details = $this->promotion->getDetails()) {
            $data = [
                'discountForAllUsers' => [
                    'type' => $details->getDiscountForAllUsers()->getType(),
                    'value' => $details->getDiscountForAllUsers()->getValue()
                ],
                'discountForLoggedInUsers' => [
                    'type' => $details->getDiscountForLoggedInUsers()->getType(),
                    'value' => $details->getDiscountForLoggedInUsers()->getValue()
                ],
                'windowThresholdInDays' => $details->getWindowThresholdInDays()
            ];
        }

        return $this->appendData(['details' => $data]);
    }
}
