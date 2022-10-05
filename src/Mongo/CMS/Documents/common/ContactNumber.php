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
    protected $type;

    /**
     * @var CountryCode
     * @ODM\Field(type="int", enumType=SYSOTEL\APP\Common\Enums\CountryCode::class)
     */
    protected $countryCode;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $number;

    public function toString(): string
    {
        return "+{$this->countryCode->value} {$this->number}";
    }

    /**
     * @return ContactNumberType
     */
    public function getType(): ContactNumberType
    {
        return $this->type;
    }

    /**
     * @param ContactNumberType $type
     * @return ContactNumber
     */
    public function setType(ContactNumberType $type): ContactNumber
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return CountryCode
     */
    public function getCountryCode(): CountryCode
    {
        return $this->countryCode;
    }

    /**
     * @param CountryCode $countryCode
     * @return ContactNumber
     */
    public function setCountryCode(CountryCode $countryCode): ContactNumber
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return ContactNumber
     */
    public function setNumber(string $number): ContactNumber
    {
        $this->number = $number;
        return $this;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}
