<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum CancellationPolicyStatus: string
{
    use EnumLabelExtension;

    case ACTIVE = 'ACTIVE';
    case EXPIRED = 'EXPIRED';
}
