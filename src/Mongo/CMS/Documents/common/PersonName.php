<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\PersonTitle;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class PersonName extends EmbeddedDocument
{
    /**
     * @var PersonTitle
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\PersonTitle::class)
     */
    public $title;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $firstName;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $lastName;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $fullName;

    /**
     * Sets full name using firstname and last name
     */
    protected function setName(string $fn, string $ln, string $title)
    {
        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->fullName = $fn . ' ' . $ln;
    }
}
