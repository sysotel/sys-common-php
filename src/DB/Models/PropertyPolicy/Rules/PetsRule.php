<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy\Rules;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property ?bool $isAllowed
 * @property  ?string $details
 */
class PetsRule extends EmbeddedModel
{
    /**
     * @return string
     */
    public function description(): string
    {
        $str = '';
        if(isset($this->isAllowed)) {
            $str .= 'Property ' . ($this->isAllowed ? 'is ' : 'is NOT ') . ' pet friendly';

            $str .= $this->details ?? '';
        }

        return trim($str);
    }
}
