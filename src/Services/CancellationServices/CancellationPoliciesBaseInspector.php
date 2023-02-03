<?php

namespace SYSOTEL\APP\Common\Services\CancellationServices;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\PropertyCancellationPolicy;

abstract class CancellationPoliciesBaseInspector
{
    public function __construct(
        protected PropertyCancellationPolicy $cancellationPolicy
    ) {}
}
