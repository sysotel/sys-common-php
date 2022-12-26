<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\PropertyCancellationPolicy;
use SYSOTEL\APP\Common\Services\CancellationServices\CancellationPoliciesInspector;

class PropertyCancellationPolicyDataGenerator
{
    use Helpers;

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

    /**
     * @return PropertyCancellationPolicyDataGenerator
     */
    public function addBasicDetails(): PropertyCancellationPolicyDataGenerator
    {
        $data = [
            'id' => $this->policy->getId(),
            'accountId' => $this->policy->getAccountId(),
            'status' => $this->policy->getStatus(),
            'propertyId' => $this->policy->getPropertyId(),
        ];

        return $this->appendData($data);
    }

    /**
     * @return PropertyCancellationPolicyDataGenerator
     */
    public function addDescription(): PropertyCancellationPolicyDataGenerator
    {
        return $this->appendData([
            'description' => (new CancellationPoliciesInspector($this->policy))->getAllSentences(),
        ]);

    }

}
