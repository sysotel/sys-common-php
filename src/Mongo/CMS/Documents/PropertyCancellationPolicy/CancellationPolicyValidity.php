<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\EmbeddedDocument
 *
 */
class CancellationPolicyValidity extends EmbeddedDocument
{

    /**
     * @var ?Carbon
     * @ODM\Field(type="carbon")
     */
    protected $startDate;

    /**
     *  @var ?Carbon
     * @ODM\Field(type="carbon")
     */
    protected $endDate;

    /**
     * @return Carbon|null
     */
    public function getStartDate(): ?Carbon
    {
        return $this->startDate;
    }

    /**
     * @param Carbon|null $startDate
     */
    public function setStartDate(?Carbon $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return Carbon|null
     */
    public function getEndDate(): ?Carbon
    {
        return $this->endDate;
    }

    /**
     * @param Carbon|null $endDate
     */
    public function setEndDate(?Carbon $endDate): void
    {
        $this->endDate = $endDate;
    }

}
