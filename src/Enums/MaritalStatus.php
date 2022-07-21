<?php

namespace SYSOTEL\APP\Common\Enums;

enum MaritalStatus: string
{
    use EnumLabelExtension;

    case MARRIED = 'MARRIED';
    case UNMARRIED = 'UNMARRIED';
}
