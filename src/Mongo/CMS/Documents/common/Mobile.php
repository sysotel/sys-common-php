<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CountryCode;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class Mobile extends EmbeddedDocument
{
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
