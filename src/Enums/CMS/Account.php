<?php

namespace App\Enums;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum Account: string
{
    use BackedEnumHelpers;

    case SELF = 'SELF';

    public function getModel(): Account
    {
        $account = \App\Models\Account::find($this->value);

        if(!$account) {
            abort(500, 'Account not found');
        }

        return $account;
    }
}
