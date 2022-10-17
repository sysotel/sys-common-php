<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules;;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class GuestDocumentRule extends EmbeddedDocument
{
    use HasDetails;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    protected $isDocumentsRequiredOnCheckIn;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    protected $isLocalIdAllowed;

    /**
     * @var array
     * @ODM\Field(type="collection")
     */
    protected $acceptableIdentityProofs = [];

    /**
     * @return ?bool
     */
    public function isDocumentsRequiredOnCheckIn(): ?bool
    {
        return $this->isDocumentsRequiredOnCheckIn;
    }

    /**
     * @param bool|null $isDocumentsRequiredOnCheckIn
     * @return GuestDocumentRule
     */
    public function setIsDocumentsRequiredOnCheckIn(bool|null $isDocumentsRequiredOnCheckIn): GuestDocumentRule
    {
        $this->isDocumentsRequiredOnCheckIn = $isDocumentsRequiredOnCheckIn;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function isLocalIdAllowed(): ?bool
    {
        return $this->isLocalIdAllowed;
    }

    /**
     * @param bool|null $isLocalIdAllowed
     * @return GuestDocumentRule
     */
    public function setIsLocalIdAllowed(bool|null $isLocalIdAllowed): GuestDocumentRule
    {
        $this->isLocalIdAllowed = $isLocalIdAllowed;
        return $this;
    }

    /**
     * @return array
     */
    public function getAcceptableIdentityProofs(): array
    {
        return $this->acceptableIdentityProofs;
    }

    /**
     * @param array $acceptableIdentityProofs
     * @return GuestDocumentRule
     */
    public function setAcceptableIdentityProofs(array $acceptableIdentityProofs): GuestDocumentRule
    {
        $this->acceptableIdentityProofs = $acceptableIdentityProofs;
        return $this;
    }

    /**
     * @return string
     */
    public function description(): string
    {
        $str = '';
        if(isset($this->isDocumentsRequiredOnCheckIn)) {
            $str .= 'Documents are ' . ($this->isDocumentsRequiredOnCheckIn ? 'required ' : 'NOT required ') . 'while check in';
        }

        if(!empty($str)) $str .= ' ';

        if(isset($this->isLocalIdAllowed)) {
            $str .= 'Guests with local IDs are ' . ($this->isLocalIdAllowed ? 'allowed ' : 'NOT allowed ');
        }

        if(!empty($str)) $str .= ' ';

        $str .= $this->details ?? '';

        return trim($str);
    }
}
