<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\embedded;

use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Enums\CMS\PartialAmountType;
use SYSOTEL\APP\Common\Enums\CMS\PenaltyType;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductPaymentType;

/**
 * @property ?PenaltyType $type
 * @property ?int $value
 */
class Penalty extends EmbeddedModel
{
    protected $casts = [
        'type' => PenaltyType::class,
    ];

    /**
     * @param $penaltyType
     * @return bool
     */
    public function isOfType($penaltyType): bool
    {
        return $this->type === $penaltyType;
    }
}
