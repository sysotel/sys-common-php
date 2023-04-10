<?php


namespace SYSOTEL\APP\Common\DB\Models\PropertyImage\embedded;


use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\Enums\ImageFileExtension;

/**
 * @property ?ImageResolution $resolution
 * @property ?ImageFileExtension $extension
 * @property ?int $sizeInKB
 */
class ImageMetadata extends Model
{
    protected $casts = [
        'extension' => ImageFileExtension::class,
    ];


    public function resolution(): EmbedsOne
    {
        return $this->embedsOne(ImageResolution::class);
    }

}
