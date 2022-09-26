<?php

namespace SYSOTEL\APP\Common\Services\ImageServices\Facades;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Facade;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageVersion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\PropertyImage;

/**
 * @method static PropertyImage storeImage(UploadedFile $imageFile)
 * @method static self useDocument(PropertyImage $document)
 * @method static null|string imageURL(PropertyImage $image, PropertyImageVersion $version)
 *
 * @see \SYSOTEL\APP\Common\Services\ImageServices\ImageStorageManager
*/
class ImageStorageManager extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ImageStorageManager';
    }
}
