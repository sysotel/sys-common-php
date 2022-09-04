<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PropertyPolicyShowcaseType: string
{
    use EnumLabelExtension;

    case PARAGRAPH = 'PARAGRAPH';
    case MULTILINE = 'MULTILINE';
}
