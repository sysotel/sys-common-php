<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\PropertyImage;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\PropertyPolicies;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

class PropertyPoliciesRepository extends DocumentRepository
{
    /**
     * @param Property|int $property
     * @return PropertyPolicies|null
     */
    public function findLatestPolicies(Property|int $property): ?PropertyPolicies
    {
        return $this->findOneBy([
            'propertyId' => Property::resolveID($property),
        ], ['createdAt' => -1]);
    }

    /**
     * @param Property|int $property
     * @return PropertyPolicies|null
     */
    public function findActivePolicies(Property|int $property)
    {
        $policies = $this->findLatestPolicies($property);
        if($policies && $policies->isStatus(PropertyPolicyStatus::ACTIVE)) {
            return $policies;
        }
    }
}
