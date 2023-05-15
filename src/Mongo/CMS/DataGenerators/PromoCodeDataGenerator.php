<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\BasicPromotion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\Promotion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

class PromoCodeDataGenerator
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
     * @return PromoCodeDataGenerator
     */
    public function addBasicDetails(): PromoCodeDataGenerator
    {
        return $this->appendData([
            'promoId' => $this->promotion->getPromoId(),
            'internalName' => $this->promotion->getInternalName(),
            'displayName' => $this->promotion->getDisplayName(),
            'status' => $this->promotion->getStatus(),
            'category' => $this->promotion->getCategory(),
            'isExpired' => $this->promotion->getIsExpired(),
            'code' => $this->promotion->getCode(),
            'type' => $this->promotion->getType(),
            'dateRestrictionType' => $this->promotion->getDateRestrictionType(),
            'applicableToAllSpaces' => $this->promotion?->getApplicableSpaceDetails()?->getApplicableOnAllSpaces(),
        ]);

    }

    /**
     * @return PromoCodeDataGenerator
     */
    public function addBookingTimeSpan(): PromoCodeDataGenerator
    {
        if ($bookingTimeSpan = $this->promotion->getBookingTimeSpan()) {
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
     * @return PromoCodeDataGenerator
     */
    public function addStayTimeSpan(): PromoCodeDataGenerator
    {
        if ($stayTimeSpan = $this->promotion->getStayTimeSpan()) {
            return $this->appendData([
                'stayTimeSpan' => [
                    'start' => $stayTimeSpan->getStart()->format('Y-m-d'),
                    'end' => $stayTimeSpan->getEnd()->format('Y-m-d')
                ]
            ]);
        }

        return $this;
    }

    public function addApplicableSpaceDetails(bool $addSpaceProductNames = true): PromoCodeDataGenerator
    {
        $applicableSpaces = [];

        if ($applicableSpaceDetails = $this->promotion->getApplicableSpaceDetails()) {
            foreach ($applicableSpaceDetails->getApplicableSpaces() as $spaces) {
                $spaceId = $spaces->getSpaceId();
                $applicableToAllProducts = $spaces->getApplicableOnAllProducts();
                $applicableProducts = [];

                foreach ($spaces->getApplicableProducts() as $product) {
                    $productId = $product->getProductId();

                    $propertyProduct = PropertyProduct::repository()->find($productId);

                    $applicableProducts[] = [
                        'productId' => $productId,
                        'productName' => ($propertyProduct !== null) ? $propertyProduct->getDisplayName() : null
                    ];
                }
                /**
                 * @var PropertySpace $space
                 */
                $space = PropertySpace::repository()->find($spaceId);

                $spaceName = '';
                if ($space !== null) {
                    $spaceName = $space->getDisplayName();
                }


                $applicableSpaces[] = [
                    'spaceId' => $spaceId,
                    'applicableToAllProducts' => $applicableToAllProducts,
                    'applicableProducts' => $applicableProducts,
                    'spaceName' => $spaceName,
                ];
            }
        }

        $data = [
            'applicableSpaces' => $applicableSpaces,
        ];

        return $this->appendData($data);

    }

    /**
     * @return PromoCodeDataGenerator
     */
    public function addDetails(): PromoCodeDataGenerator
    {
        $data = null;

        if ($this->promotion instanceof BasicPromotion && $details = $this->promotion->getDetails()) {
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
