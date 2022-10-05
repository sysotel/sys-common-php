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
    protected $documentsRequiredOnCheckIn;

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
     * @return bool
     */
    public function isDocumentsRequiredOnCheckIn(): bool
    {
        return $this->documentsRequiredOnCheckIn;
    }

    /**
     * @param bool $documentsRequiredOnCheckIn
     * @return GuestDocumentRule
     */
    public function setDocumentsRequiredOnCheckIn(bool $documentsRequiredOnCheckIn): GuestDocumentRule
    {
        $this->documentsRequiredOnCheckIn = $documentsRequiredOnCheckIn;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLocalIdAllowed(): bool
    {
        return $this->isLocalIdAllowed;
    }

    /**
     * @param bool $isLocalIdAllowed
     * @return GuestDocumentRule
     */
    public function setIsLocalIdAllowed(bool $isLocalIdAllowed): GuestDocumentRule
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
        if(isset($this->documentsRequiredOnCheckIn)) {
            $str .= 'Documents are ' . ($this->documentsRequiredOnCheckIn ? 'required ' : 'NOT required ') . 'while check in';
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
