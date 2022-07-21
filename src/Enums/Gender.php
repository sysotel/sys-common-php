<?php

namespace SYSOTEL\APP\Common\Enums;

enum Gender: string
{
    use EnumLabelExtension;

    case MALE = 'MALE';
    case FEMALE = 'FEMALE';
}
