<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy;

use Carbon\Carbon;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\Document(collection="propertyPolicies")
 * @ODM\HasLifecycleCallbacks
 */
class PropertyPolicies extends BaseDocument
{
    use HasObjectIdKey, HasAccountId, HasPropertyId, HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var ?CustomPolicyItem
     * @ODM\EmbedOne (targetDocument=CustomPolicyItem::class)
     */
    protected $generalPolicy;

    /**
     * @var ?AgePolicy
     * @ODM\EmbedOne (targetDocument=AgePolicy::class)
     */
    protected $agePolicy;

    /**
     * @var ?CheckInPolicy
     * @ODM\EmbedOne (targetDocument=CheckInPolicy::class)
     */
    protected $checkInPolicy;

    /**
     * @var ?CheckOutPolicy
     * @ODM\EmbedOne (targetDocument=CheckOutPolicy::class)
     */
    protected $checkOutPolicy;

    /**
     * @var ?PropertyRules
     * @ODM\EmbedOne (targetDocument=PropertyRules::class)
     */
    protected $rules;

    /**
     * @var ArrayCollection & CustomPolicyItem[]
     * @ODM\EmbedMany (targetDocument=CustomPolicyItem::class)
     */
    protected $customPolicies;

    /**
     * @var PropertyPolicyStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus::class)
     */
    protected $status;

    /**
     * @var ?Carbon
     * @ODM\Field(type="carbon")
     */
    protected $expiredAt;

    /**
     * @var UserReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference::class)
     */
    protected $causer;


    protected $defaults = [
        'status' => PropertyPolicyStatus::ACTIVE
    ];

    public function __construct()
    {
        $this->customPolicies = new ArrayCollection;
    }

    /**
     * @return CustomPolicyItem|null
     */
    public function getGeneralPolicy(): ?CustomPolicyItem
    {
        return $this->generalPolicy;
    }

    /**
     * @param CustomPolicyItem|null $generalPolicy
     * @return PropertyPolicies
     */
    public function setGeneralPolicy(?CustomPolicyItem $generalPolicy): PropertyPolicies
    {
        $this->generalPolicy = $generalPolicy;
        return $this;
    }

    /**
     * @return AgePolicy|null
     */
    public function getAgePolicy(): ?AgePolicy
    {
        return $this->agePolicy;
    }

    /**
     * @param AgePolicy|null $agePolicy
     * @return PropertyPolicies
     */
    public function setAgePolicy(?AgePolicy $agePolicy): PropertyPolicies
    {
        $this->agePolicy = $agePolicy;
        return $this;
    }

    /**
     * @return CheckInPolicy|null
     */
    public function getCheckInPolicy(): ?CheckInPolicy
    {
        return $this->checkInPolicy;
    }

    /**
     * @param CheckInPolicy|null $checkInPolicy
     * @return PropertyPolicies
     */
    public function setCheckInPolicy(?CheckInPolicy $checkInPolicy): PropertyPolicies
    {
        $this->checkInPolicy = $checkInPolicy;
        return $this;
    }

    /**
     * @return CheckOutPolicy|null
     */
    public function getCheckOutPolicy(): ?CheckOutPolicy
    {
        return $this->checkOutPolicy;
    }

    /**
     * @param CheckOutPolicy|null $checkOutPolicy
     * @return PropertyPolicies
     */
    public function setCheckOutPolicy(?CheckOutPolicy $checkOutPolicy): PropertyPolicies
    {
        $this->checkOutPolicy = $checkOutPolicy;
        return $this;
    }

    /**
     * @return PropertyRules|null
     */
    public function getRules(): ?PropertyRules
    {
        return $this->rules;
    }

    /**
     * @param PropertyRules|null $rules
     * @return PropertyPolicies
     */
    public function setRules(?PropertyRules $rules): PropertyPolicies
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * @return ArrayCollection|CustomPolicyItem[]
     */
    public function getCustomPolicies(): ArrayCollection|array
    {
        return $this->customPolicies;
    }

    /**
     * @param ArrayCollection|CustomPolicyItem[] $customPolicies
     * @return PropertyPolicies
     */
    public function setCustomPolicies(ArrayCollection|array $customPolicies): PropertyPolicies
    {
        $this->customPolicies = $customPolicies;
        return $this;
    }

    /**
     * @return PropertyPolicyStatus
     */
    public function getStatus(): PropertyPolicyStatus
    {
        return $this->status;
    }

    /**
     * @param PropertyPolicyStatus $status
     * @return PropertyPolicies
     */
    public function setStatus(PropertyPolicyStatus $status): PropertyPolicies
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getExpiredAt(): ?Carbon
    {
        return $this->expiredAt;
    }

    /**
     * @param Carbon|null $expiredAt
     * @return PropertyPolicies
     */
    public function setExpiredAt(?Carbon $expiredAt): PropertyPolicies
    {
        $this->expiredAt = $expiredAt;
        return $this;
    }

    /**
     * @return UserReference
     */
    public function getCauser(): UserReference
    {
        return $this->causer;
    }

    /**
     * @param UserReference $causer
     * @return PropertyPolicies
     */
    public function setCauser(UserReference $causer): PropertyPolicies
    {
        $this->causer = $causer;
        return $this;
    }

    /**
     * @return array
     */
    public function getDefaults(): array
    {
        return $this->defaults;
    }

    /**
     * @param array $defaults
     * @return PropertyPolicies
     */
    public function setDefaults(array $defaults): PropertyPolicies
    {
        $this->defaults = $defaults;
        return $this;
    }

    /**
     * @return $this
     */
    public function markAsExpired(): self
    {
        $this->status = PropertyPolicyStatus::EXPIRED;
        $this->expiredAt = now();
        return $this;
    }
}
