<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity\PropertyAmenity;

class PropertyAmenityRepository extends DocumentRepository
{
    /**
     * @param Property|int $property
     * @return PropertyAmenity[]
     */
    public function findAllForPropertyAmenities(Property|int $property): array
    {
        return $this->findBy([
            'propertyId' => Property::resolveID($property),
            'target' => AmenityTarget::PROPERTY
        ]);
    }

    /**
     * @param Property|int $property
     * @param int $spaceId
     * @return PropertyAmenity[]
     */
    public function findAllSpaceAmenities(Property|int $property, int $spaceId): array
    {
        return $this->findBy([
            'propertyId' => Property::resolveID($property),
            'spaceId' => $spaceId,
            'target' => AmenityTarget::SPACE
        ]);
    }
}
