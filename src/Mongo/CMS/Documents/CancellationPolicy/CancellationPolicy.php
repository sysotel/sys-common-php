<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\CancellationPolicy;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\Document(
 *     collection="propertyAmenities",
 *
 *     )
 * @ODM\HasLifecycleCallbacks
 */
class CancellationPolicy extends BaseDocument
{
    use HasObjectIdKey, HasPropertyId, HasTimestamps;

    /**
     * @var ArrayCollection & CancellationPolicyItem[]
     * @ODM\EmbedOne(targetDocument=CancellationPolicyItem::class)
     */
   protected $rules;

    /**
     * @var ?CancellationPolicyValidity
     * @ODM\EmbedOne(targetDocument=CancellationPolicyValidity::class)
     */
   protected $validity;

    /**
     * @var CancellationPolicyStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus::class)
     */
   protected $status;

    /**
     * @return CancellationPolicyItem|null
     */
    public function getRules(): ?CancellationPolicyItem
    {
        return $this->rules;
    }

    /**
     * @param CancellationPolicyItem|null $rules
     */
    public function setRules(?CancellationPolicyItem $rules): void
    {
        $this->rules = $rules;
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
     * @return CancellationPolicyValidity|null
     */
    public function getValidity(): ?CancellationPolicyValidity
    {
        return $this->validity;
    }

    /**
     * @param CancellationPolicyValidity|null $validity
     */
    public function setValidity(?CancellationPolicyValidity $validity): void
    {
        $this->validity = $validity;
    }


}
