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
     * @var ?bool
     * @ODM\Field(type="bool")
     */
    public $isAutoVerified;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $remark;

    /**
     * @var ?Carbon
     * @ODM\Field(type="carbon")
     */
    public $verifiedAt;

    /**
     * @var ?UserReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference::class)
     */
    public $causer;

    /**
     * @return Verification
     */
    public static function defaultDocument(): Verification
    {
        return (new self)->setStatus(VerificationStatus::PENDING);
    }

    /**
     * @return Verification
     */
    public static function autoVerifiedDocument(): Verification
    {
        return (new self)
            ->setStatus(VerificationStatus::PENDING)
            ->setIsAutoVerified(true);
    }

    /**
     * @param VerificationStatus $status
     * @return $this
     */
    public function verify(VerificationStatus $status): static
    {
        return $this->setStatus($status)->setVerifiedAt(now());
    }

    /**
     * @return VerificationStatus
     */
    public function getStatus(): VerificationStatus
    {
        return $this->status;
    }

    /**
     * @param VerificationStatus $status
     * @return Verification
     */
    public function setStatus(VerificationStatus $status): Verification
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsAutoVerified(): ?bool
    {
        return $this->isAutoVerified;
    }

    /**
     * @param bool $isAutoVerified
     * @return Verification
     */
    public function setIsAutoVerified(bool $isAutoVerified): Verification
    {
        $this->isAutoVerified = $isAutoVerified;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRemark(): ?string
    {
        return $this->remark;
    }

    /**
     * @param string $remark
     * @return Verification
     */
    public function setRemark(string $remark): Verification
    {
        $this->remark = $remark;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getVerifiedAt(): ?Carbon
    {
        return $this->verifiedAt;
    }

    /**
     * @param Carbon $verifiedAt
     * @return Verification
     */
    public function setVerifiedAt(Carbon $verifiedAt): Verification
    {
        $this->verifiedAt = $verifiedAt;
        return $this;
    }

    /**
     * @return UserReference|null
     */
    public function getCauser(): ?UserReference
    {
        return $this->causer;
    }

    /**
     * @param UserReference $causer
     * @return Verification
     */
    public function setCauser(UserReference $causer): Verification
    {
        $this->causer = $causer;
        return $this;
    }
}
