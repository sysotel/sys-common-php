<?php

namespace SYSOTEL\APP\Common\DB\ArrayGenerators;


use SYSOTEL\APP\Common\DB\Models\PropertyImage\PropertyImage;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageTarget;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageVersion;

class PropertyImageDataGenerator extends ArrayDataGenerator
{

    private PropertyImage $image;

    private string $baseUrl;

    public function __construct(PropertyImage $image, string $baseUrl)
    {
        $this->image = $image;
        $this->baseUrl = $baseUrl;
    }

    public static function create(PropertyImage $image, string $baseUrl): static
    {
        return new static($image, $baseUrl);
    }

    public function addBasicDetails(): PropertyImageDataGenerator
    {
        $data = [
            'id' => $this->image->id,
            'accountId' => $this->image->accountId,
            'propertyId' => $this->image->propertyId,
            'spaceId' => $this->image->spaceId,
            'target' => $this->image->target?->value,
            'isFeatured' => $this->image->isFeatured,
            'title' => $this->image->title,
            'description' => $this->image->description,
            'status' => $this->image->status,
        ];

        if($this->image->target === PropertyImageTarget::LOGO) {
            $data['url'] = $this->url($this->image->filePath(PropertyImageVersion::ORIGINAL));
        } elseif($this->image->target === PropertyImageTarget::BANNER) {
            $data['url'] = $this->url($this->image->filePath(PropertyImageVersion::ORIGINAL));
        } else {
            $data['url'] = $this->url($this->image->filePath(PropertyImageVersion::STANDARD_LARGE));
            $data['thumbnailUrl'] = $this->url($this->image->filePath(PropertyImageVersion::SQUARE_LARGE));
        }

        return $this->appendData($data);
    }

    protected function url(string $path): string
    {
        return $this->baseUrl . $path;
    }
}
