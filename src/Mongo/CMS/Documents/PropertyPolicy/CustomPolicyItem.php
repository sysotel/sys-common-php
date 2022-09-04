<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\PropertyAmenity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyShowcaseType;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class CustomPolicyItem extends EmbeddedDocument
{
    /**
     * @var PropertyPolicyShowcaseType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyPolicyShowcaseType::class)
     */
    public $showcaseType;

    /**
     * @var string
     * @ODM\field(type="string")
     */
    public $details;
}
