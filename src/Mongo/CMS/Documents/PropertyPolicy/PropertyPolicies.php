<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy;

use Carbon\Carbon;
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
 */
class PropertyPolicies extends BaseDocument
{
    use HasObjectIdKey, HasAccountId, HasPropertyId, HasTimestamps;

    /**
     * @var CustomPolicyItem
     * @ODM\EmbedOne (targetDocument=CustomPolicyItem::class)
     */
    public $generalPolicy;

    /**
     * @var AgePolicy
     * @ODM\EmbedOne (targetDocument=AgePolicy::class)
     */
    public $agePolicy;

    /**
     * @var CheckInPolicy
     * @ODM\EmbedOne (targetDocument=CheckInPolicy::class)
     */
    public $checkInPolicy;

    /**
     * @var CheckOutPolicy
     * @ODM\EmbedOne (targetDocument=CheckOutPolicy::class)
     */
    public $checkOutPolicy;

    /**
     * @var PropertyRules
     * @ODM\EmbedOne (targetDocument=PropertyRules::class)
     */
    public $rules;

    /**
     * @var ArrayCollection & CustomPolicyItem[]
     * @ODM\EmbedMany (targetDocument=CustomPolicyItem::class)
     */
    public $customPolicies;

    /**
     * @var PropertyPolicyStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus::class)
     */
    public $status;

    /**
     * @var Carbon
     * @ODM\Field(type="carbon")
     */
    public $expiredAt;

    /**
     * @var UserReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference::class)
     */
    public $causer;


    protected $defaults = [
        'status' => PropertyPolicyStatus::ACTIVE
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->customPolicies = new ArrayCollection;
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
