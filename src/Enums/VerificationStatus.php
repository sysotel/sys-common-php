<?php

namespace SYSOTEL\APP\Common\Enums\Master;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum VerificationStatus: string
{
    use EnumLabelExtension;

    case PENDING = 'PENDING';
    case VERIFIED = 'VERIFIED';
    case REJECTED = 'REJECTED';
}
