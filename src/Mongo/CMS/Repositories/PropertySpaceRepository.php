<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\InventoryAccuracy;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

class PropertySpaceRepository extends DocumentRepository
{
    /**
     * @param int $spaceId
     * @param Property|int $propertyId
     * @return PropertySpace|null
     */
    public function findSpaceForProperty(int $spaceId, Property|int $propertyId): PropertySpace|null
    {
        return $this->findOneBy([
            '_id' => $spaceId,
            'propertyId' => Property::resolveID($propertyId)
        ]);
    }

    /**
     * @param int $spaceId
     * @param Property|int $property
     * @return PropertySpace|null
     */
    public function findOneByIdAndProperty(int $spaceId, Property|int $property): ?PropertySpace
    {
        return $this->findOneBy([
            '_id' => $spaceId,
            'propertyId' => Property::resolveID($property)
        ]);
    }

    /**
     * @param Property|int $property
     * @param array $criteria
     * @param array $orderBy
     * @return array
     */
    public function findAllForProperty(Property|int $property, array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge(['propertyId' => Property::resolveID($property)], $criteria);
        $orderBy = array_merge($orderBy, ['_id' => 1]);

        return $this->findBy($criteria, $orderBy);
    }

    /**
     * @param Property|int $property
     * @return array
     */
    public function findAllDailySpaces(Property|int $property): array
    {
        $criteria = [
            'inventorySettings.accuracy' => InventoryAccuracy::DAILY
        ];

        return $this->findAllForProperty($property, $criteria);
    }

    /**
     * @param Property|int $property
     * @return array
     */
    public function findAllHourlySpaces(Property|int $property): array
    {
        $criteria = [
            'inventorySettings.accuracy' => InventoryAccuracy::HOURLY
        ];

        return $this->findAllForProperty($property, $criteria);
    }

    /**
     * @param Property|int $property
     * @param array $criteria
     * @param array $orderBy
     * @return array
     */
    public function findAllActiveForProperty(Property|int $property, array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge($criteria, ['status' => PropertySpaceStatus::ACTIVE]);

        return $this->findAllForProperty($property, $criteria, $orderBy);
    }

    /**
     * @param Property|int $property
     * @return array
     */
    public function findAllActiveDailySpaces(Property|int $property, array $criteria = []): array
    {
        $criteria = array_merge([
            'inventorySettings.accuracy' => InventoryAccuracy::DAILY
        ], $criteria);

        return $this->findAllActiveForProperty($property, $criteria);
    }

    /**
     * @param Property|int $property
     * @return array
     */
    public function findAllActiveHourlySpaces(Property|int $property, array $criteria = []): array
    {
        $criteria = array_merge([
            'inventorySettings.accuracy' => InventoryAccuracy::HOURLY
        ], $criteria);

        return $this->findAllActiveForProperty($property, $criteria);
    }


    /**
     * @param Property|int $property
     * @return array
     */
    public function findAllInactiveSpaces(Property|int $property): array
    {
        return $this->findAllForProperty($property, ['status' => PropertySpaceStatus::INACTIVE]);
    }

    public function getActiveHourlySlots(Property|int $property)
    {
        $propertyId = Property::resolveID($property);

        return PropertySpace::queryBuilder()
            ->field('propertyId')->equals($propertyId)
            ->field('status')->equals(PropertySpaceStatus::ACTIVE)
            ->distinct('inventorySettings.hourlySlots')
            ->getQuery()
            ->execute();
    }
}
