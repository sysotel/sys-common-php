<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Carbon\Carbon;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\Gender;
use SYSOTEL\APP\Common\Enums\MaritalStatus;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class Person extends EmbeddedDocument
{
    /**
     * @var PersonName
     * @ODM\EmbedOne(targetDocument=PersonName::class")
     */
    public $name;

    /**
     * @var MaritalStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\MaritalStatus::class)
     */
    public $maritalStatus;

    /**
     * @var Gender
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\Gender::class)
     */
    public $gender;

    /**
     * @var Carbon
     * @ODM\Field(type="carbon")
     */
    public $birthDate;
}
