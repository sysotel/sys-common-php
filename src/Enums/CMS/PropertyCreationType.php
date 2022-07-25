<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum PropertyCreationType: string
{
    use BackedEnumHelpers;

    case ADMIN_CREATION = 'ADMIN_CREATION';
    case USER_INVITATION = 'USER_INVITATION';
}
