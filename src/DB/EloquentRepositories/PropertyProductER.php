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
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PropertyProductER extends EloquentRepository
{
    /**
     * @param Property|int $property
     * @param PropertyProductStatus|null $status
     * @return Collection & PropertyProduct[]
     */
    public function getAllForProperty(Property|int $property, PropertyProductStatus $status = null)
    {
        return PropertyProduct::query()
            ->wherePropertyId($property)
            ->when($status, fn($q) => $q->whereStatus($status))
            ->get();
    }

    /**
     * @param int $productId
     * @param Property|int $property
     * @return Model|object|PropertyProductEQB|null
     */
    public function getByIdAndPropertyId(int $productId, Property|int $property)
    {
        return PropertyProduct::query()
            ->where('id', $productId)
            ->wherePropertyId($property)
            ->first();
    }

    public function getAllSpaces(PropertySpace|int $space, PropertyProductStatus $status = null): Collection|array
    {
        return PropertyProduct::query()
            ->whereSpaceId($space)
            ->when($status, fn($q) => $q->whereStatus($status))
            ->get();
    }


}
