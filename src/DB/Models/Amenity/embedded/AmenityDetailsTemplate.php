<?php

namespace SYSOTEL\APP\Common\DB\Models\Amenity\embedded;

use Jenssegers\Mongodb\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTemplateType;

/**
 * @property ?AmenityTemplateType $type
 * @property ?Collection $attributes
*/
class AmenityDetailsTemplate extends EmbeddedModel
{
    protected $casts = [
        'type' => AmenityTemplateType::class,
    ];


    public function attributes(): EmbedsMany
    {
        return $this->embedsMany(TemplateAttribute::class);
    }

}
