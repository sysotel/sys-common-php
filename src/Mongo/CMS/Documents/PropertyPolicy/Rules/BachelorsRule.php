<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Rules\PropertyPolicy;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class BachelorsRule extends EmbeddedDocument
{
    use HasIsAllowedFlag, HasDetails;
}
