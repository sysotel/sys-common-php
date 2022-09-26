<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Carbon\Carbon;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
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
    public $isAutoVerified;

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
     * @var UserReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference::class)
     */
    public $causer;

    /**
     * @return Verification
     */
    public static function defaultDocument(): Verification
    {
        return new self([
            'status' => VerificationStatus::PENDING
        ]);
    }

    /**
     * @return Verification
     */
    public static function autoVerifiedDocument(): Verification
    {
        return (new self([
            'isAutoVerified' => true,
        ]))->verify(VerificationStatus::VERIFIED);
    }

    /**
     * @param VerificationStatus $status
     * @return $this
     */
    public function verify(VerificationStatus $status): static
    {
        $this->status = $status;
        $this->verifiedAt = now();
        return $this;
    }
}
