<?php

namespace SYSOTEL\APP\Common\Enums;

enum IdProofType: string
{
    use EnumLabelExtension, BackedEnumHelpers;

    case PAN = 'PAN';
    case AADHAAR = 'AADHAAR';
    case DRIVING_LICENCE = 'DRIVING_LICENCE';
    case GOVERNMENT_ID = 'GOVERNMENT_ID';
}
