<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PromotionDiscountType;

/**
 * @ODM\EmbeddedDocument
 */
class ApplicableSpaceDetails extends EmbeddedDocument
{
    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $applicableOnAllSpaces;

    /**
     * @var ApplicableSpaces
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\ApplicableSpaces::class)
     */
    public $applicableSpaces;

    /**
     * @return bool
     */
    public function isApplicableOnAllSpaces(): bool
    {
        return $this->applicableOnAllSpaces;
    }

    /**
     * @param bool $applicableOnAllSpaces
     */
    public function setApplicableOnAllSpaces(bool $applicableOnAllSpaces): void
    {
        $this->applicableOnAllSpaces = $applicableOnAllSpaces;
    }

    /**
     * @return ApplicableSpaces
     */
    public function getApplicableSpaces(): ApplicableSpaces
    {
        return $this->applicableSpaces;
    }

    /**
     * @param ApplicableSpaces $applicableSpaces
     */
    public function setApplicableSpaces(ApplicableSpaces $applicableSpaces): void
    {
        $this->applicableSpaces = $applicableSpaces;
    }


}
