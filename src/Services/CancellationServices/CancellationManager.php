<?php

namespace SYSOTEL\APP\Common\Services\CancellationServices;

use Carbon\Carbon;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\PropertyCancellationPolicy;

class CancellationManager
{
    /**
     * @var PropertyCancellationPolicy
     */
    protected PropertyCancellationPolicy $cancellationPolicy;

    /**
     * @param PropertyCancellationPolicy $cancellationPolicy
     */
    public function __construct(PropertyCancellationPolicy $cancellationPolicy)
    {
        $this->cancellationPolicy = $cancellationPolicy;
    }

    /**
     * @param PropertyCancellationPolicy $cancellationPolicy
     * @return CancellationManager
     */
    public static function create(PropertyCancellationPolicy $cancellationPolicy): CancellationManager
    {
        return new self($cancellationPolicy);
    }

    /**
     * @return CancellationPoliciesBasicInspector
     */
    public function basicInspector(): CancellationPoliciesBasicInspector
    {
        return new CancellationPoliciesBasicInspector($this->cancellationPolicy);
    }

    /**
     * @param Carbon $checkInDate
     * @return CancellationPoliciesAdvanceInspector
     */
    public function advanceInspector(Carbon $checkInDate): CancellationPoliciesAdvanceInspector
    {
        return new CancellationPoliciesAdvanceInspector($this->cancellationPolicy, $checkInDate);
    }
}
