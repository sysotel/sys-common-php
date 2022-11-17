<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity\PropertyAmenity;

class PropertyCancellationRepository extends DocumentRepository
{

    /**
     * @param Property|int $property
     * @return array
     */
    public function getActiveCancellationPolicy(Property|int $property): array{

        return $this->findOneBy([
            'propertyId' =>Property::resolveID($property),
            'status' => CancellationPolicyStatus::ACTIVE
        ]);
    }

    /**
     * @param Property|int $property
     * @return array
     */
    public function getAllCancellationPolicy(Property|int $property): array{
        return $this->findOneBy([
            'propertyId' =>Property::resolveID($property)

        ]);
    }


}
