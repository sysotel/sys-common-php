<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\CancellationPolicy;

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
 */
class CancellationPolicyItem extends EmbeddedDocument
{

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $deadlineInHours;

    /**
     * @var ?Penalty
     * @ODM\EmbedOne (targetDocument=Penalty::class)
     */
    protected  $penalty;

    /**
     * @return int|null
     */
    public function getDeadlineInHours(): ?int
    {
        return $this->deadlineInHours;
    }

    /**
     * @param int|null $deadlineInHours
     */
    public function setDeadlineInHours(?int $deadlineInHours): void
    {
        $this->deadlineInHours = $deadlineInHours;
    }

    /**
     * @return Penalty|null
     */
    public function getPenalty(): ?Penalty
    {
        return $this->penalty;
    }

    /**
     * @param Penalty|null $penalty
     */
    public function setPenalty(?Penalty $penalty): void
    {
        $this->penalty = $penalty;
    }

}
