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
    public $documentsRequiredOnCheckIn;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $isLocalIdAllowed;

    /**
     * @var array
     * @ODM\Field(type="collection")
     */
    public $acceptableIdentityProofs;

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

        return $str;
    }
}
