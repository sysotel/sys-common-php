<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class BasicPromotionDetails extends EmbeddedDocument
{
    /**
     * @var ?BookingTimeSpan
    * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\BookingTimespan::class)
     */
    public $bookingTimeSpan;


    /**
     * @var ?StayTimespan
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\StayTimespan::class)
     */
    public $stayTimeSpan;

    /**
     * @var Collection & PromotionOffers[]
     * @ODM\EmbedMany (targetDocument= SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\PromotionOffers::class)
     */
    public $offers;

    public function __construct(){
        $this->offers = new ArrayCollection;
    }

    /**
     * @return BookingTimeSpan|null
     */
    public function getBookingTimeSpan(): ?BookingTimeSpan
    {
        return $this->bookingTimeSpan;
    }

    /**
     * @param BookingTimeSpan|null $bookingTimeSpan
     * @return BasicPromotionDetails
     */
    public function setBookingTimeSpan(?BookingTimeSpan $bookingTimeSpan): BasicPromotionDetails
    {
        $this->bookingTimeSpan = $bookingTimeSpan;
        return $this;
    }

    /**
     * @return StayTimespan|null
     */
    public function getStayTimeSpan(): ?StayTimespan
    {
        return $this->stayTimeSpan;
    }

    /**
     * @param StayTimespan|null $stayTimeSpan
     * @return BasicPromotionDetails
     */
    public function setStayTimeSpan(?StayTimespan $stayTimeSpan): BasicPromotionDetails
    {
        $this->stayTimeSpan = $stayTimeSpan;
        return $this;
    }

    /**
     * @return ArrayCollection|Collection|PromotionOffers[]
     */
    public function getOffers(): ArrayCollection|Collection|array
    {
        return $this->offers;
    }

    /**
     * @param ArrayCollection|Collection|PromotionOffers[] $offers
     * @return BasicPromotionDetails
     */
    public function setOffers(ArrayCollection|Collection|array $offers): BasicPromotionDetails
    {
        $this->offers = $offers;
        return $this;
    }



}
