<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy\Rules;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property ?bool $isAllowed
 * @property  ?string $details
 */
class BachelorsRule extends EmbeddedModel
{
    /**
     * @return string
     */
    public function description(): string
    {
        $str = '';
        if(isset($this->isAllowed)) {
            $str .= 'Bachelors are ' . ($this->isAllowed ? 'Allowed ' : 'NOT Allowed ');

            $str .= $this->details ?? '';
        }

        return trim($str);
    }
}
