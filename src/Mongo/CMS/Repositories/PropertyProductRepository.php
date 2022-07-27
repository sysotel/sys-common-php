<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

class PropertyProductRepository extends DocumentRepository
{
    /**
     * @param PropertySpace|int $space
     * @param array $criteria
     * @param array $orderBy
     * @return array
     */
    public function findAllForSpace(PropertySpace|int $space, array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge(['spaceId' => PropertySpace::resolveID($space)], $criteria);

        return $this->findBy($criteria, $orderBy);
    }

    /**
     * @param PropertySpace|int $space
     * @return array
     */
    public function findAllActiveForSpace(PropertySpace|int $space): array
    {
        return $this->findAllForSpace($space, ['status' => PropertyProductStatus::ACTIVE]);
    }

    /**
     * @param PropertySpace|int $space
     * @return array
     */
    public function findAllInactiveForSpace(PropertySpace|int $space): array
    {
        return $this->findAllForSpace($space, ['status' => PropertyProductStatus::INACTIVE]);
    }
}
