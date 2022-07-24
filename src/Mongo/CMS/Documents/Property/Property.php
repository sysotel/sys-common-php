<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Property;

use Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use SYSOTEL\APP\Common\Enums\CMS\PropertyStarRating;
use SYSOTEL\APP\Common\Enums\CMS\PropertyType;
use SYSOTEL\APP\Common\Enums\Currency;
use SYSOTEL\APP\Common\Enums\CMS\PropertyStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Address;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAutoIncrementId;

/**
 * @ODM\Document(
 *     collection="properties",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class Property extends Document
{
    use HasAccountId;
    use HasAutoIncrementId;
    use CanResolveIntegerID;
    use HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $slug;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $accountSlug;

    /**
     * @var Currency
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\Currency::class)
     */
    public $baseCurrency;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $displayName;

    /**
     * @var PropertyStarRating
     * @ODM\Field(type="int", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyStarRating::class)
     */
    public $starRating;

    /**
     * @var PropertyType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyType::class)
     */
    public $type;

    /**
     * @var Address
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\Address::class)
     */
    public $address;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $noOfSpaces;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $noOfFloors;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $buildYear;

    /**
     * @var PropertyStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyStatus::class)
     */
    public $status;


    protected $defaults = [
        'baseCurrency' => Currency::INR,
        'status'       => PropertyStatus::ACTIVE,
    ];
}
