<?php

namespace SYSOTEL\APP\Common\DB\EloquentQueryBuilders;

use Jenssegers\Mongodb\Eloquent\Builder;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;

class LocationEQB extends Builder
{
    public function whereType(LocationType $type): LocationEQB
    {
        return $this->where('type', $type->value);
    }

    public function whereCategorySlug(string $slug): LocationEQB
    {
        return $this->where('categorySlug', $slug);
    }

    public function whereCountryId(string $id): LocationEQB
    {
        return $this->where('country.id', new ObjectId($id));
    }

    public function whereStateId(string $id): LocationEQB
    {
        return $this->where('state.id', new ObjectId($id));
    }

    public function whereCityId(string $id): LocationEQB
    {
        return $this->where('city.id', new ObjectId($id));
    }

    public function whereAreaId(string $id): LocationEQB
    {
        return $this->where('area.id', new ObjectId($id));
    }
}
