<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy\Rules;


use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property ?bool $isAllowed
 * @property  ?string $details
 */
class OutsideFoodRule extends EmbeddedModel
{

    /**
     * @return string
     */
    public function description(): string
    {
        $str = '';
        if(isset($this->isAllowed)) {
            $str .= 'Outside food is ' . ($this->isAllowed ? 'Allowed ' : 'NOT Allowed ');

            $str .= $this->details ?? '';
        }

        return trim($str);
    }
}
