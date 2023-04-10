<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyContact;

use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PropertyContactStatus;
use SYSOTEL\APP\Common\Enums\CMS\PropertyContactType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\ContactNumber;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Email;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\Document(collection="emenities")
 */
class PropertyContact extends BaseDocument
{
    use HasObjectIdKey, HasAccountId, HasPropertyId, HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var PropertyContactType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyContactType::class)
     */
    public $type;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $receiverName;

    /**
     * @var ArrayCollection & Email[]
     * @ODM\EmbedMany (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Email::class)
     */
    public $emails;

    /**
     * @var ArrayCollection & ContactNumber[]
     * @ODM\EmbedMany (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\ContactNumber::class)
     */
    public $contactNumbers;

    /**
     * @var PropertyContactStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyContactStatus::class)
     */
    public $status;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $printOnBookingVoucher;


    protected $defaults = [
        'status'       => PropertyContactStatus::ACTIVE,
        'printOnBookingVoucher' => false
    ];

    public function __construct(array $attributes = [])
    {
        $this->emails = new ArrayCollection;
        $this->contactNumbers = new ArrayCollection;

        parent::__construct($attributes);
    }
}
