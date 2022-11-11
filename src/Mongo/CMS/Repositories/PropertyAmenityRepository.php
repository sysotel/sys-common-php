<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity\PropertyAmenity;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

class PropertyAmenityRepository extends DocumentRepository
{
    public function findAllForPropertyAmenities(Property|int $property): ?PropertyAmenity{
        return $this->findOneBy([
            'propertyId' => Property::resolveID($property),
            'target' => AmenityTarget::PROPERTY
        ]);
    }

    public function findAllSpaceAmenities(Property|int $property, int $spaceId): array{
        return $this->findOneBy([
            'propertyId' => Property::resolveID($property),
            'spaceId' => $spaceId,
            'target' => AmenityTarget::SPACE
        ]);
    }
}
