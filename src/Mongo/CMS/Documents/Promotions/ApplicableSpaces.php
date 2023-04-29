<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PromotionDiscountType;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class ApplicableSpaces extends EmbeddedDocument
{
    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    public $spaceId;

    /**
     * @var ?bool
     * @ODM\Field(type="bool")
     */
    public $applicableOnAllProducts;

    /**
     * @var Collection & ?ApplicableProducts[]
     * @ODM\EmbedMany (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\ApplicableProducts::class)
     */
    public $applicableProducts;


    public function __construct()
    {
        $this->applicableProducts = new ArrayCollection;
    }

    /**
     * @return int|null
     */
    public function getSpaceId(): ?int
    {
        return $this->spaceId;
    }

    /**
     * @param int|null $spaceId
     */
    public function setSpaceId(?int $spaceId): void
    {
        $this->spaceId = $spaceId;
    }

    /**
     * @return bool|null
     */
    public function getApplicableOnAllProducts(): ?bool
    {
        return $this->applicableOnAllProducts;
    }

    /**
     * @param bool|null $applicableOnAllProducts
     */
    public function setApplicableOnAllProducts(?bool $applicableOnAllProducts): void
    {
        $this->applicableOnAllProducts = $applicableOnAllProducts;
    }

    /**
     * @return ArrayCollection|Collection|ApplicableProducts[]|null
     */
    public function getApplicableProducts(): ArrayCollection|Collection|array|null
    {
        return $this->applicableProducts;
    }

    /**
     * @param ArrayCollection|Collection|ApplicableProducts[]|null $applicableProducts
     */
    public function setApplicableProducts(ArrayCollection|Collection|array|null $applicableProducts): void
    {
        $this->applicableProducts = $applicableProducts;
    }



    /**
     * @param ApplicableProducts $applicableProducts
     * @return $this
     */
    public function addApplicableProducts(ApplicableProducts $applicableProducts): static
    {
        $this->applicableProducts->add($applicableProducts);
        return $this;
    }



}
