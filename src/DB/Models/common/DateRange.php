<?php


namespace SYSOTEL\APP\Common\DB\Models\common;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\CMS\ContactNumberType;
use SYSOTEL\APP\Common\Enums\CountryCode;
use SYSOTEL\APP\Common\Enums\UserType;
use SYSOTEL\APP\Common\Enums\VerificationStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;

/**
 * @property ?Carbon $start
 * @property ?Carbon $end

 */
class DateRange extends EmbeddedModel
{
}
