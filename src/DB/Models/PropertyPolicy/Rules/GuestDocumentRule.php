<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy\Rules;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property  ?string $details
 * @property  ?bool $isDocumentRequiredOnCheckIn
 * @property ?bool $isLocalIdAllowed
 * @property array $acceptableIdentityProofs
 */
class GuestDocumentRule extends EmbeddedModel
{
    protected $attributes = [
        'acceptableIdentityProofs' => []
    ];

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
