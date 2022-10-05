<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\PersonTitle;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class PersonName extends EmbeddedDocument
{
    /**
     * @var ?PersonTitle
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\PersonTitle::class)
     */
    protected $title;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $firstName;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $lastName;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $fullName;

    /**
     * Sets full name using firstname and last name
     */
    public function setName(string $fn, string $ln, ?string $title = null)
    {
        $this->title = $title;
        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->fullName = $fn . ' ' . $ln;
    }

    /**
     * @return PersonTitle|null
     */
    public function getTitle(): ?PersonTitle
    {
        return $this->title;
    }

    /**
     * @param PersonTitle|null $title
     * @return PersonName
     */
    public function setTitle(?PersonTitle $title): PersonName
    {
        $this->title = $title;
        return $this;
    }
}
