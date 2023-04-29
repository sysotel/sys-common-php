<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PromotionDiscountType;

/**
 * @ODM\EmbeddedDocument
 */
class ApplicableSpaces extends EmbeddedDocument
{
    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $spaceId;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $applicableOnAllProducts;

    /**
     * @var ApplicableProducts
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\ApplicableProducts::class)
     */
    public $applicableProducts;

    /**
     * @return int
     */
    public function getSpaceId(): int
    {
        return $this->spaceId;
    }

    /**
     * @param int $spaceId
     */
    public function setSpaceId(int $spaceId): void
    {
        $this->spaceId = $spaceId;
    }

    /**
     * @return bool
     */
    public function isApplicableOnAllProducts(): bool
    {
        return $this->applicableOnAllProducts;
    }

    /**
     * @param bool $applicableOnAllProducts
     */
    public function setApplicableOnAllProducts(bool $applicableOnAllProducts): void
    {
        $this->applicableOnAllProducts = $applicableOnAllProducts;
    }

    /**
     * @return ApplicableProducts
     */
    public function getApplicableProducts(): ApplicableProducts
    {
        return $this->applicableProducts;
    }

    /**
     * @param ApplicableProducts $applicableProducts
     */
    public function setApplicableProducts(ApplicableProducts $applicableProducts): void
    {
        $this->applicableProducts = $applicableProducts;
    }

}
