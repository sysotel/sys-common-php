<?php

namespace SYSOTEL\APP\Common\DB\Models\Promotions;

use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\Enums\CMS\PromotionDiscountType;

/**
 * @property ?PromotionDiscountType $type
 * @property ?float $value
*/
class PromotionOfferDiscount extends EmbeddedModel
{
}
