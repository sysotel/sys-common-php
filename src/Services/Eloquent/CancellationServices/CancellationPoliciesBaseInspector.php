<?php

namespace SYSOTEL\APP\Common\Services\Eloquent\CancellationServices;


use SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\PropertyCancellationPolicy;

abstract class CancellationPoliciesBaseInspector
{
    public function __construct(
        protected PropertyCancellationPolicy $cancellationPolicy
    ) {}
}
