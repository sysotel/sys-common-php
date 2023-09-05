<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PropertyProductStatus: string
{
    use EnumLabelExtension;

    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';

    public function userFriendlyName(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'In Active',
        };
    }
}
