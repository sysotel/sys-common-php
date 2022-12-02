<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy;

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
class CancellationPolicyRules extends EmbeddedDocument
{

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $startInterval;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $endInterval;

    /**
     * @var ?Penalty
     * @ODM\EmbedOne (targetDocument=Penalty::class)
     */
    protected  $penalty;

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

    /**
     * @return int|null
     */
    public function getStartInterval(): ?int
    {
        return $this->startInterval;
    }

    /**
     * @param int|null $startInterval
     */
    public function setStartInterval(?int $startInterval): void
    {
        $this->startInterval = $startInterval;
    }

    /**
     * @return int|null
     */
    public function getEndInterval(): ?int
    {
        return $this->endInterval;
    }

    /**
     * @param int|null $endInterval
     */
    public function setEndInterval(?int $endInterval): void
    {
        $this->endInterval = $endInterval;
    }

}
