<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\PropertyCancellationPolicy;

class PropertyCancellationRepository extends DocumentRepository
{

    /**
     * @param Property|int $property
     * @return PropertyCancellationPolicy|null
     */
    public function getActivePolicy(Property|int $property): ?PropertyCancellationPolicy{

        return $this->findOneBy([
            'propertyId' =>Property::resolveID($property),
            'status' => CancellationPolicyStatus::ACTIVE
        ], [
            'createdAt' => -1
        ]);
    }

    /**
     * @param Property|int $property
     * @return PropertyCancellationPolicy[]
     */
    public function getAllPolicy(Property|int $property): array{
        return $this->findBy([
            'propertyId' =>Property::resolveID($property)
        ]);
    }


}
