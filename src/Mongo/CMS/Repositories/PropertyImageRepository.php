<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Repositories;

use Delta4op\Mongodb\Repositories\DocumentRepository;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\PropertyImage;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

class PropertyImageRepository extends DocumentRepository
{
    /**
     * @param Property|int $property
     * @return PropertyImage[]
     */
    public function getAllActiveImages(Property|int $property): array
    {
        return $this->getAllImages(
            $property,
            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]
        );
    }

    /**
     * @param Property|int $property
     * @param array $criteria
     * @param array $orderBy
     * @return PropertyImage[]
     */
    public function getAllImages(Property|int $property, array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge([
            'propertyId' => Property::resolveID($property),
        ], $criteria);

        $orderBy = array_merge([
            'isFeatured' => -1,
        ], $orderBy);

        return $this->findBy($criteria, $orderBy);
    }

    public function getPropertyLogo(Property|int $property): PropertyImage|null
    {
        $criteria = [
            'propertyId' => Property::resolveID($property),
            'target' => PropertyImageTarget::LOGO,
            'status' => ['$eq' => PropertyImageStatus::ACTIVE]
        ];

        $orderBy = [
            'createdAt' => -1
        ];

        return $this->findOneBy($criteria, $orderBy);
    }

    /**
     * @param Property|int $property
     * @return PropertyImage[]
     */
    public function getActivePropertyImages(Property|int $property): array
    {
        return $this->getPropertyImages(
            $property,
            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]
        );
    }

    /**
     * @param Property|int $property
     * @return PropertyImage[]
     */
    public function getFeaturedPropertyImages(Property|int $property): array
    {
        return $this->getPropertyImages(
            $property,
            ['isFeatured' => true]
        );
    }

    /**
     * @param Property|int $property
     * @return PropertyImage|null
     */
    public function getFeaturedOrFirstActivePropertyImage(Property|int $property): PropertyImage|null
    {
        $images = $this->getPropertyImages(
            $property,
            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]

        );

        return count($images) ? $images[0] : null;
    }

    /**
     * @param Property|int $property
     * @return PropertyImage|null
     */
    public function getActiveFeaturedPropertyImage(Property|int $property): PropertyImage|null
    {
        $images = $this->getPropertyImages(
            $property,
            ['isFeatured' => true],
            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]

        );

        return count($images) ? $images[0] : null;
    }

    /**
     * @param Property|int $property
     * @param array $criteria
     * @param array $orderBy
     * @return PropertyImage[]
     */
    public function getPropertyImages(Property|int $property, array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge([
            'propertyId' => Property::resolveID($property),
            'target' => PropertyImageTarget::PROPERTY,
        ], $criteria);

        $orderBy = array_merge([
            'isFeatured' => -1,
        ], $orderBy);

        return $this->findBy($criteria, $orderBy);
    }

    /**
     * @param PropertySpace|int $space
     * @return PropertyImage[]
     */
    public function getActiveSpaceImages(PropertySpace|int $space): array
    {
        return $this->getAllSpaceImages(
            $space,
            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]
        );
    }

    /**
     * @param PropertySpace|int $space
     * @return PropertyImage|null
     */
    public function getActiveFeaturedSpaceImage(PropertySpace|int $space): PropertyImage|null
    {
        $images = $this->getAllSpaceImages(
            $space,
            ['isFeatured' => true],
            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]
        );

        return count($images) ? $images[0] : null;
    }

    /**
     * @param PropertySpace|int $space
     * @return PropertyImage|null
     */
    public function getFeaturedOrFirstActiveSpaceImage(PropertySpace|int $space): PropertyImage|null
    {
        $images = $this->getAllSpaceImages(
            $space,
            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]
        );

        return count($images) ? $images[0] : null;
    }

    /**
     * @param PropertySpace|int $space
     * @return PropertyImage[]
     */
    public function getFeaturedSpaceImages(PropertySpace|int $space): array
    {
        return $this->getAllSpaceImages(
            $space,
            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]
        );
    }

    /**
     * @param PropertySpace|int $space
     * @param array $criteria
     * @param array $orderBy
     * @return PropertyImage[]
     */
    public function getAllSpaceImages(PropertySpace|int $space, array $criteria = [], array $orderBy = []): array
    {
        $criteria = array_merge([
            'spaceId' => PropertySpace::resolveID($space),
            'target' => PropertyImageTarget::SPACE,
        ], $criteria);

        $orderBy = array_merge([
            'isFeatured' => -1,
        ], $orderBy);

        return $this->findBy($criteria, $orderBy);
    }


}
