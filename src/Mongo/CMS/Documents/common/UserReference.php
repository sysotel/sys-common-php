<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\UserType;

/**
 * @ODM\EmbeddedDocument
 */
class UserReference extends EmbeddedDocument
{
    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $id;

    /**
     * @var UserType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\UserType::class)
     */
    public $type;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @var Email
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Email::class)
     */
    public $email;

    /**
     * @var Mobile
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Mobile::class)
     */
    public $mobile;
}
