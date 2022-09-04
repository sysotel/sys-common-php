<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\PropertyAmenity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\LateCheckOutStatus;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class CheckOutPolicy extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $dailyStandardTime;

    /**
     * @var LateCheckOutStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\LateCheckOutStatus::class)
     */
    public $lateCheckOutStatus;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $lateCheckOutDetails;
}
