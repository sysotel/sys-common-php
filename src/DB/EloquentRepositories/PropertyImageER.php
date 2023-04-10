<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyProductEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PropertyImageER extends EloquentRepository
{
    /**
     * @param Property|int $property
     * @param PropertyProductStatus|null $status
     * @return Collection & PropertyProduct[]
     */
    public function getFeaturedOrFirstPropertyImage(Property|int $property, PropertyImageStatus $status = null, PropertyImageTarget $target = null)
    {
        return PropertyProduct::query()
            ->wherePropertyId($property)
            ->when($status, fn($q) => $q->whereStatus($status))
            ->where($target, fn($q) => $q->whereTaregt($target))
            ->get();
    }



}
