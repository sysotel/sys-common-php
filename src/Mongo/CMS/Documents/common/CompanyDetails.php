<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Address;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Email;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\RawAddress;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Mobile;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class CompanyDetails extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @var RawAddress
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\RawAddress::class)
     */
    public $rawAddress;

    /**
     * @var Address
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\Address::class)
     */
    public $address;

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

    /**
     * @var Url
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Url::class)
     */
    public $websiteURL;
}
