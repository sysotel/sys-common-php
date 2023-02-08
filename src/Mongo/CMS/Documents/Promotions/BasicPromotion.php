<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class BasicPromotion extends Promotion
{
    /**
     * @var ?BasicPromotionDetails
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\BasicPromotionDetails::class)
     */
    private $details;

    /**
     * @return BasicPromotionDetails|null
     */
    public function getDetails(): ?BasicPromotionDetails
    {
        return $this->details;
    }

    /**
     * @param BasicPromotionDetails|null $details
     */
    public function setDetails(?BasicPromotionDetails $details): void
    {
        $this->details = $details;
    }


}
