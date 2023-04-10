<?php


namespace SYSOTEL\APP\Common\DB\Models\common;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\FileExtension;
use SYSOTEL\APP\Common\Enums\FileSizeUnit;
use SYSOTEL\APP\Common\Enums\UserType;
use SYSOTEL\APP\Common\Enums\VerificationStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;

/**
 * @property ?float $value
 * @property  FileSizeUnit $unit
 */
class FileSize extends EmbeddedModel
{
    protected $casts = [
        'unit' => FileSizeUnit::class,
    ];


}
