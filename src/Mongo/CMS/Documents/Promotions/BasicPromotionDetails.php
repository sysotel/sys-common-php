<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class BasicPromotionDetails extends EmbeddedDocument
{

    /**
     * @var Collection & PromotionOffers[]
     * @ODM\EmbedMany (targetDocument= SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\PromotionOffers::class)
     */
    public $offers;

    public function __construct(){
        $this->offers = new ArrayCollection;
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

    public function addOffers(PromotionOffers $offers): static
    {
        $this->offers->add($offers);
        return $this;
    }






}
