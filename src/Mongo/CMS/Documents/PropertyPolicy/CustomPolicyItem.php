<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy;

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
    protected $showcaseType;

    /**
     * @var string
     * @ODM\field(type="string")
     */
    protected $details;

    /**
     * @return PropertyPolicyShowcaseType
     */
    public function getShowcaseType(): PropertyPolicyShowcaseType
    {
        return $this->showcaseType;
    }

    /**
     * @param PropertyPolicyShowcaseType $showcaseType
     * @return CustomPolicyItem
     */
    public function setShowcaseType(PropertyPolicyShowcaseType $showcaseType): CustomPolicyItem
    {
        $this->showcaseType = $showcaseType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetails(): string
    {
        return $this->details;
    }

    /**
     * @param string $details
     * @return CustomPolicyItem
     */
    public function setDetails(string $details): CustomPolicyItem
    {
        $this->details = $details;
        return $this;
    }
}
