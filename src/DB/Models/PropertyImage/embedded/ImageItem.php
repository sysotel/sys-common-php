<?php


namespace SYSOTEL\APP\Common\DB\Models\PropertyImage\embedded;


use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageVersion;

/**
 * @property ?PropertyImageVersion $version
 * @property ?string $filePath
 * @property ?Collection $meta
 *
 */
class ImageItem extends Model
{
    protected $casts = [
        'version' => PropertyImageVersion::class,
    ];

    public function meta(): EmbedsMany
    {
        return $this->embedsMany(ImageMetadata::class);
    }


}
