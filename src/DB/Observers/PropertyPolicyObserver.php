<?php

namespace SYSOTEL\APP\Common\DB\Observers;

use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\PropertyPolicies;

class PropertyPolicyObserver
{
    /**
     * @param PropertyPolicies $policy
     * @return void
     */
    public function creating(PropertyPolicies $policy): void
    {
        $policy->id = NumericIdGenerator::get($policy);
    }
}
