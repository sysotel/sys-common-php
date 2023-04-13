<?php

namespace SYSOTEL\APP\Common\DB\EloquentRepositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertyProductEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertyImage\PropertyImage;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;

class PropertyImageER extends EloquentRepository
{
    /**
     * @param Property|int $property
     * @param PropertyImageStatus|null $status
     * @param PropertyImageTarget|null $target
     * @return Collection
     */
    public function getFeaturedOrFirstPropertyImage(Property|int $property, PropertyImageStatus $status = null, PropertyImageTarget $target = null)
    {
        return PropertyImage::query()
            ->wherePropertyId($property)
            ->whereStatus($status)
            ->whereTarget($target)
            ->get();
    }

    public function getFeaturedPropertyImage(Property|int $property)
    {
        $image = $this->getFeaturedOrFirstPropertyImage($property);
        if ($image && $image->isFeatured) {
            return $image;
        }
        return null;
    }

    public function getFeaturedOrFirstPropertySpaceImage(PropertySpace $space)
    {
        return PropertyImage::query()
            ->whereSpaceId($space)
            ->where('target', PropertyImageTarget::SPACE)
            ->where('status', PropertyImageStatus::ACTIVE)
            ->get();
    }

    public function getFeaturedPropertySpaceImage(PropertySpace $space)
    {
        $image = $this->getFeaturedOrFirstPropertySpaceImage($space);
        if($image && $image->isFeatured) {
            return $image;
        }
        return null;
    }


//    public function getAllActiveImages(Property|int $property): array
//    {
//        return $this->getAllImages(
//            $property,
//            ['status' => PropertyImageStatus::ACTIVE]
//        );
//    }

    public function getAllImages(Property|int $property): array
    {

        return PropertyImage::query()
            ->wherePropertyId($property)
            ->get();
    }

    public function getPropertyLogo(Property|int $property)
    {

        return PropertyImage::query()
            ->wherePropertyId($property)
            ->whereTarget(PropertyImageTarget::LOGO)
            ->whereStatus(PropertyImageStatus::ACTIVE)
            ->get();
    }

    public function getPropertyBanner(Property|int $property)
    {
        return PropertyImage::query()
            ->wherePropertyId($property)
            ->whereTarget(PropertyImageTarget::BANNER)
            ->whereStatus(PropertyImageStatus::ACTIVE)
            ->get();
    }

//    /**
//     * @param Property|int $property
//     * @return PropertyImage[]
//     */
//    public function getActivePropertyImages(Property|int $property): array
//    {
//        return $this->getPropertyImages(
//            $property,
//            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]
//        );
//    }

    /**
     * @param Property|int $property
     * @return PropertyImage[]
     */
    public function getActivePropertyAndSpaceImages(Property|int $property): array
    {
        return $this->getPropertyAndSpaceImages(
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

    public function getPropertyImages(Property|int $property): array
    {
        return PropertyImage::query()
            ->wherePropertyId($property)
            ->whereTarget(PropertyImageTarget::PROPERTY)
            ->get();
    }

    /**
     * @param Property|int $property
     * @param array $criteria
     * @param array $orderBy
     * @return PropertyImage[]
     */
    public function getPropertyAndSpaceImages(Property|int $property): array
    {
        return PropertyImage::query()
            ->wherePropertyId($property)
            ->whereTarget(PropertyImageTarget::PROPERTY, PropertyImageTarget::SPACE)
            ->get();
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
    public function getActiveFeaturedSpaceImage(PropertySpace|int $space)
    {
        $images = $this->getAllSpaceImages(
            $space,
            ['isFeatured' => true],
            ['status' => ['$eq' => PropertyImageStatus::ACTIVE]]
        );

        return count($images) ? $images[0] : null;
    }

    public function getFeaturedOrFirstActiveSpaceImage(PropertySpace|int $space)
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

    public function getAllSpaceImages(PropertySpace|int $space): array
    {
        return PropertyImage::query()
            ->whereSpaceId($space)
            ->whereTarget( PropertyImageTarget::SPACE)
            ->get();
    }






}
