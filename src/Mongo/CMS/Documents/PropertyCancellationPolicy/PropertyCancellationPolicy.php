<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\Document(
 *     collection="cancellationPolicy"
 *     )
 * @ODM\HasLifecycleCallbacks
 */
class PropertyCancellationPolicy extends BaseDocument
{
    use HasObjectIdKey, HasAccountId, HasPropertyId, HasTimestamps;

    /**
     * @var ArrayCollection & CancellationPolicyItem[]
     * @ODM\EmbedMany(targetDocument=CancellationPolicyItem::class)
     */
    protected $rules;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $freeCancellationBefore;

    /**
     * @var CancellationPolicyStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus::class)
     */
    protected $status;

    public function __construct()
    {
        $this->rules = new ArrayCollection;
    }

    /**
     * @return ArrayCollection|Collection|CancellationPolicyItem[]
     */
    public function getRules(): array|ArrayCollection|Collection
    {
        return $this->rules;
    }

    /**
     * @param ArrayCollection|Collection|CancellationPolicyItem[] $rules
     */
    public function setRules(array|ArrayCollection|Collection $rules): void
    {
        $this->rules = $rules;
    }

    public function addAmenity(CancellationPolicyItem $val): static
    {
        $this->rules->add($val);
        return $this;
    }

    /**
     * @return CancellationPolicyStatus
     */
    public function getStatus(): CancellationPolicyStatus
    {
        return $this->status;
    }

    /**
     * @param CancellationPolicyStatus $status
     */
    public function setStatus(CancellationPolicyStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getFreeCancellationBefore(): int
    {
        return $this->freeCancellationBefore;
    }

    /**
     * @param int $freeCancellationBefore
     */
    public function setFreeCancellationBefore(int $freeCancellationBefore): void
    {
        $this->freeCancellationBefore = $freeCancellationBefore;
    }


}
