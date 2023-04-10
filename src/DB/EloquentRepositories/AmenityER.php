<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Database\Eloquent\Collection;
use SYSOTEL\APP\Common\DB\Models\Amenity\Amenity;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;

class AmenityER extends EloquentRepository
{
    /**
     * @return array
     */
    public function getAllPropertyAmenities(): array
    {
       return Amenity::query()
           ->whereTarget(AmenityTarget::PROPERTY)
           ->orderByDesc('isFeatured')
           ->orderBy('featureOrder')
           ->get();
    }

    public function getAllSpaceAmenities(): array
    {
        return Amenity::query()
            ->whereTarget(AmenityTarget::SPACE)
            ->orderByDesc('isFeatured')
            ->orderBy('featureOrder')
            ->get();
    }



}
