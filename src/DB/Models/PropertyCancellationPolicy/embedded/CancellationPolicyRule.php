<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\embedded;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property ?int $startInterval
 * @property ?int $endInterval
 * @property  ?Penalty $penalty
 */
class CancellationPolicyRule extends EmbeddedModel
{
    public function penalty(): EmbedsOne
    {
        return $this->embedsOne(Penalty::class);
    }
}
