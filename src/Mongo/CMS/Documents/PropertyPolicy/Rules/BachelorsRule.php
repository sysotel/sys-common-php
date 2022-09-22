<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules;;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class BachelorsRule extends EmbeddedDocument
{
    use HasIsAllowedFlag, HasDetails;

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

        return $str;
    }
}
