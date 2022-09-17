<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\ContactNumberType;
use SYSOTEL\APP\Common\Enums\CountryCode;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class ContactNumber extends EmbeddedDocument
{
    /**
     * @var ContactNumberType
     * @ODM\Field(type="int", enumType=SYSOTEL\APP\Common\Enums\ContactNumberType::class)
     */
    public $type;

    /**
     * @var CountryCode
     * @ODM\Field(type="int", enumType=SYSOTEL\APP\Common\Enums\CountryCode::class)
     */
    public $countryCode;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $number;

    public function toString(): string
    {
        return "+{$this->countryCode->value} {$this->number}";
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}
