<?php

namespace SYSOTEL\APP\Common\DB\ArrayGenerators;

use SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\PropertyCancellationPolicy;
use SYSOTEL\APP\Common\DB\Models\PropertyImage\PropertyImage;
use SYSOTEL\APP\Common\Services\Eloquent\CancellationServices\CancellationManager;

class PropertyCancellationPolicyDataGenerator extends ArrayDataGenerator
{

    /**
     * @var PropertyCancellationPolicy
     */
    protected PropertyCancellationPolicy $policy;

    /**
     * @param PropertyCancellationPolicy $policy
     */
    protected function __construct(PropertyCancellationPolicy $policy)
    {
        $this->policy = $policy;
    }

    public static function create(PropertyCancellationPolicy $policy): static
    {
        return new static($policy);
    }
    /**
     * @return PropertyCancellationPolicyDataGenerator
     */
    public function addBasicDetails(): PropertyCancellationPolicyDataGenerator
    {
        $data = [
            'id' => $this->policy->id,
            'accountId' => $this->policy->accountId,
            'status' => $this->policy->status,
            'propertyId' => $this->policy->propertyId,
        ];

        return $this->appendData($data);
    }

    /**
     * @return PropertyCancellationPolicyDataGenerator
     */
    public function addDescription(): PropertyCancellationPolicyDataGenerator
    {
        return $this->appendData([
            'description' => CancellationManager::create($this->policy)->basicInspector()->getAllSentences(),
        ]);
    }
}
