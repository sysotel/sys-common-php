<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageVersion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\PropertyImage;

class PropertyImageDataGenerator
{
    use Helpers;

    /**
     * @var PropertyImage
     */
    protected PropertyImage $image;

    /**
     * @var string
     */
    protected string $baseUrl;

    /**
     * @param PropertyImage $image
     * @param string $baseUrl
     */
    protected function __construct(PropertyImage $image, string $baseUrl)
    {
        $this->image = $image;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param PropertyImage $image
     * @param string $baseUrl
     * @return static
     */
    public static function create(PropertyImage $image, string $baseUrl): static
    {
        return new static($image, $baseUrl);
    }

    /**
     * @return PropertyImageDataGenerator
     */
    public function addBasicDetails(): PropertyImageDataGenerator
    {
        $data = [
            'id' => $this->image->id,
            'accountId' => $this->image->accountId,
            'propertyId' => $this->image->propertyId,
            'spaceId' => $this->image->spaceId,
            'target' => $this->image->target->value,
            'isFeatured' => $this->image->isFeatured,
            'title' => $this->image->title,
            'description' => $this->image->description,
            'status' => $this->image->status,
        ];

        if($this->image->target === PropertyImageTarget::LOGO) {
            $data['url'] = $this->url($this->image->filePath(PropertyImageVersion::ORIGINAL));
        } else {
            $data['url'] = $this->url($this->image->filePath(PropertyImageVersion::STANDARD_LARGE));
            $data['thumbnailUrl'] = $this->url($this->image->filePath(PropertyImageVersion::SQUARE_LARGE));
        }

        return $this->appendData($data);
    }

    /**
     * @param string $path
     * @return string
     */
    protected function url(string $path): string
    {
        return $this->baseUrl . $path;
    }
}
