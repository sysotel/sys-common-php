<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\EarlyCheckInStatus;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class CheckInPolicy extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $dailyStandardTime;

    /**
     * @var EarlyCheckInStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\EarlyCheckInStatus::class)
     */
    public $earlyCheckInStatus;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $earlyCheckInDetails;
}
