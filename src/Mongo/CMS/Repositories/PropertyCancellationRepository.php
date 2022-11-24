<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\CancellationPolicyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy\PropertyCancellationPolicies;

class PropertyCancellationRepository extends DocumentRepository
{
    /**
     * @param Property|int $property
     * @return PropertyCancellationPolicies|null
     */
    public function getActivePolicy(Property|int $property, array $orderBy = []): ?PropertyCancellationPolicies{

        return $this->findOneBy([
            'propertyId' =>Property::resolveID($property),
            'status' => CancellationPolicyStatus::ACTIVE
        ], [
            'createdAt' => -1
        ]);
    }

    /**
     * @param Property|int $property
     * @return PropertyCancellationPolicies|null
     */
    public function getAllPolicy(Property|int $property): ?PropertyCancellationPolicies{
        return $this->findOneBy([
            'propertyId' =>Property::resolveID($property)
        ]);

    }


}
