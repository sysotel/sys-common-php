<?php

namespace SYSOTEL\APP\Common\DB\Observers;

use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;

class SpaceViewObserver
{
    /**
     * @param SpaceView $view
     * @return void
     */
    public function creating(SpaceView $view): void
    {
        if(!$view->name) {
            $view->name = readableConstant($view->code);
        }
    }
}
