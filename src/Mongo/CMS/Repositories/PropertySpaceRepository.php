<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;

class PropertySpaceRepository extends DocumentRepository
{
    /**
     * @param Property|int $property
     * @param array $criteria
     * @param array $orderBy
     * @return array
     */
    public function findAllForProperty(Property|int $property, array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge(['propertyId' => Property::resolveID($property)], $criteria);

        return $this->findBy($criteria, $orderBy);
    }

    /**
     * @param Property|int $property
     * @return array
     */
    public function findAllActiveForProperty(Property|int $property): array
    {
        return $this->findAllForProperty($property, ['status' => PropertySpaceStatus::ACTIVE]);
    }

    /**
     * @param Property|int $property
     * @return array
     */
    public function findAllInactiveForProperty(Property|int $property): array
    {
        return $this->findAllForProperty($property, ['status' => PropertySpaceStatus::INACTIVE]);
    }
}
