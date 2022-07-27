<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PropertyProductPaymentType: string
{
    use EnumLabelExtension;

    case PAY_NOW = 'PAY_NOW';
    case PAY_PARTIAL = 'PAY_PARTIAL';
    case PAY_AT_PROPERTY = 'PAY_AT_PROPERTY';
}
