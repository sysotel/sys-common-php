<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

class PropertyProductRepository extends DocumentRepository
{
    /**
     * @param int $productId
     * @param Property|int $property
     * @return PropertySpace|null
     */
    public function findOneByIdAndProperty(int $productId, Property|int $property): ?PropertySpace
    {
        return $this->findOneBy([
            '_id' => $productId,
            'propertyId' => Property::resolveID($property)
        ]);
    }

    /**
     * @param PropertySpace|int $space
     * @param array $criteria
     * @param array $orderBy
     * @return PropertyProduct[]
     */
    public function findAllForSpace(PropertySpace|int $space, array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge(['spaceId' => PropertySpace::resolveID($space)], $criteria);

        return $this->findBy($criteria, $orderBy);
    }

    /**
     * @param PropertySpace|int $space
     * @param array $criteria
     * @return PropertyProduct[]
     */
    public function findAllActiveForSpace(PropertySpace|int $space, array $criteria = []): array
    {
        $criteria = array_merge(['status' => PropertyProductStatus::ACTIVE], $criteria);
        return $this->findAllForSpace($space, $criteria);
    }

    /**
     * @param PropertySpace|int $space
     * @return PropertyProduct[]
     */
    public function findAllInactiveForSpace(PropertySpace|int $space): array
    {
        return $this->findAllForSpace($space, ['status' => PropertyProductStatus::INACTIVE]);
    }
}
