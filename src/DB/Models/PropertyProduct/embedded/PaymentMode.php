<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyProduct\embedded;

use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\CMS\PartialAmountType;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductPaymentType;

/**
 * @property ?PropertyProductPaymentType $type
 * @property ?PartialAmountType $partialAmountType
 * @property ?float $partialAmount
*/
class PaymentMode extends EmbeddedModel
{
    protected $casts = [
        'type' => PropertyProductPaymentType::class,
        'partialAmountType' => PartialAmountType::class
    ];


}
