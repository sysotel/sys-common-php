<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity\PropertyAmenityItem;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\Document(
 *     collection="propertyCancellationPolicy"
 *     )
 * @ODM\HasLifecycleCallbacks
 */
class PropertyCancellationPolicy extends BaseDocument
{
    use HasObjectIdKey,HasAccountId, HasPropertyId, HasTimestamps;

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

   public function __construct(){
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
    public function setRules(array|ArrayCollection|Collection  $rules): void
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
