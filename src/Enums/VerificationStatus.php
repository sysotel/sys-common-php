<?php

namespace SYSOTEL\APP\Common\Enums;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum VerificationStatus: string
{
    use EnumLabelExtension;

    case PENDING = 'PENDING';
    case APPROVED = 'APPROVED';
    case REJECTED = 'REJECTED';
}
