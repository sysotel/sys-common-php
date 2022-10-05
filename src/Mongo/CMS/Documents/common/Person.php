<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Carbon\Carbon;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\Gender;
use SYSOTEL\APP\Common\Enums\MaritalStatus;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class Person extends EmbeddedDocument
{
    /**
     * @var ?PersonName
     * @ODM\EmbedOne(targetDocument=PersonName::class")
     */
    public $name;

    /**
     * @var ?MaritalStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\MaritalStatus::class)
     */
    public $maritalStatus;

    /**
     * @var ?Gender
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\Gender::class)
     */
    public $gender;

    /**
     * @var ?Carbon
     * @ODM\Field(type="carbon")
     */
    public $birthDate;

    /**
     * @return PersonName|null
     */
    public function getName(): ?PersonName
    {
        return $this->name;
    }

    /**
     * @param PersonName|null $name
     * @return Person
     */
    public function setName(?PersonName $name): Person
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return MaritalStatus|null
     */
    public function getMaritalStatus(): ?MaritalStatus
    {
        return $this->maritalStatus;
    }

    /**
     * @param MaritalStatus|null $maritalStatus
     * @return Person
     */
    public function setMaritalStatus(?MaritalStatus $maritalStatus): Person
    {
        $this->maritalStatus = $maritalStatus;
        return $this;
    }

    /**
     * @return Gender|null
     */
    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    /**
     * @param Gender|null $gender
     * @return Person
     */
    public function setGender(?Gender $gender): Person
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getBirthDate(): ?Carbon
    {
        return $this->birthDate;
    }

    /**
     * @param Carbon|null $birthDate
     * @return Person
     */
    public function setBirthDate(?Carbon $birthDate): Person
    {
        $this->birthDate = $birthDate;
        return $this;
    }
}
