<?php

namespace SYSOTEL\APP\Common\DB\Observers;

use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;

class PropertyProductObserver
{
    /**
     * @param PropertyProduct $product
     * @return void
     */
    public function creating(PropertyProduct $product): void
    {
        $product->id = NumericIdGenerator::get($product);
    }
}
