<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Enums\CMS\AgeCode;
use SYSOTEL\APP\Common\Enums\CMS\PromotionType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\Promotion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

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

//    /**
//     * @return PromotionDataGenerator
//     */
//    public function addBasicPromotionDetails(): PromotionDataGenerator
//    {
//       if($details = $this->promotion->getDetails()){
//
//
//    }
}
