<?php

namespace SYSOTEL\APP\Common\Enums;

/**
 * THIS NEEDS TO BE IN SYNC WITH sys-iam-api
*/
enum UserType: string
{
    case APP_USER = 'APP_USER';
    case ADMIN = 'ADMIN';
}
