<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Rules\PropertyPolicy;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class GuestDocumentRule extends EmbeddedDocument
{
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
}
