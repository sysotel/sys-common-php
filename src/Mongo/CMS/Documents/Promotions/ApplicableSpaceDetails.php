<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PromotionDiscountType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\ImageItem;

/**
 * @ODM\EmbeddedDocument
 */
class ApplicableSpaceDetails extends EmbeddedDocument
{
    /**
     * @var ?bool
     * @ODM\Field(type="bool")
     */
    public $applicableOnAllSpaces;

    /**
     * @var Collection & ?ApplicableSpaces[]
     * @ODM\EmbedMany(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\ApplicableSpaces::class)
     */
    public $applicableSpaces;

    /**
     * @return bool|null
     */
    public function getApplicableOnAllSpaces(): ?bool
    {
        return $this->applicableOnAllSpaces;
    }

    /**
     * @param bool|null $applicableOnAllSpaces
     */
    public function setApplicableOnAllSpaces(?bool $applicableOnAllSpaces): void
    {
        $this->applicableOnAllSpaces = $applicableOnAllSpaces;
    }

    public function __construct()
    {
        $this->applicableSpaces = new ArrayCollection;
    }

    /**
     * @return ArrayCollection|Collection|ApplicableSpaces[]|null
     */
    public function getApplicableSpaces(): ArrayCollection|array|Collection|null
    {
        return $this->applicableSpaces;
    }

    /**
     * @param ArrayCollection|Collection|ApplicableSpaces[]|null $applicableSpaces
     */
    public function setApplicableSpaces(ArrayCollection|array|Collection|null $applicableSpaces): void
    {
        $this->applicableSpaces = $applicableSpaces;
    }


    /**
     * @param ApplicableSpaces $applicableSpaces
     * @return $this
     */
    public function addApplicableSpaces(ApplicableSpaces $applicableSpaces): static
    {
        $this->applicableSpaces->add($applicableSpaces);
        return $this;
    }





}
