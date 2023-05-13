<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PromotionCategory: string
{
    use EnumLabelExtension;

    case PROMOTION = 'PROMOTION';
    case PROMO_CODE = 'PROMO_CODE';
}
