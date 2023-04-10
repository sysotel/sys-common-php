<?php


namespace SYSOTEL\APP\Common\DB\Models\common;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\UserType;
use SYSOTEL\APP\Common\Enums\VerificationStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;

/**
 * @property ?string $id
 */
class Email extends EmbeddedModel
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->id ?? '';
    }

}
