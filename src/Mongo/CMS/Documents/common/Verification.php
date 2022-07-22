<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Carbon\Carbon;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\VerificationStatus;

/**
 * @ODM\EmbeddedDocument
 */
class Verification extends EmbeddedDocument
{
    /**
     * @var VerificationStatus
     * @ODM\Field (type="string", enumType=SYSOTEL\APP\Common\Enums\VerificationStatus::class)
     */
    public $status;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $isAutoApproved;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $remark;

    /**
     * @var Carbon
     * @ODM\Field(type="carbon")
     */
    public $verifiedAt;

    /**
     * @return Verification
     */
    public static function defaultDocument(): Verification
    {
        return new self([
            'status' => VerificationStatus::PENDING
        ]);
    }
}
