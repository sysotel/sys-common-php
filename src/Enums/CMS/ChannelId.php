<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum ChannelId: string
{
    use BackedEnumHelpers;

    case AGGREGATE_INTELLIGENCE = 'AGGREGATE_INTELLIGENCE';
}
