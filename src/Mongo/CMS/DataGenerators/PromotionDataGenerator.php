<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\BasicPromotion;
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
            'type' => $this->promotion->getType(),
            'status' => $this->promotion->getStatus(),
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
                    'start' => $bookingTimeSpan->getStart(),
                    'end' => $bookingTimeSpan->getEnd()
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
                    'start' => $stayTimeSpan->getStart(),
                    'end' => $stayTimeSpan->getEnd()
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
}
