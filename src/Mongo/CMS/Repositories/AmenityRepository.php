<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Amenity\Amenity;

class AmenityRepository extends DocumentRepository
{
    /**
     * @param array $criteria
     * @param array $orderBy
     * @return array
     */
    public function findAllPropertyAmenities(array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge([
            'target' => AmenityTarget::PROPERTY
        ], $criteria);

        $orderBy = array_merge([
            'isFeatured' => 1
        ], $orderBy);

        return Amenity::repository()->findBy($criteria, $orderBy);
    }

    /**
     * @param array $criteria
     * @param array $orderBy
     * @return array
     */
    public function findAllSpaceAmenities(array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge([
            'target' => AmenityTarget::SPACE
        ], $criteria);

        $orderBy = array_merge([
            'isFeatured' => 1
        ], $orderBy);

        return Amenity::repository()->findBy($criteria, $orderBy);
    }
}
