<?php

namespace SYSOTEL\APP\Common\Services\IAMConnector\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VendorName\Skeleton\IAM
 */
class IAM extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sys-connector.iam';
    }
}
