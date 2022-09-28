<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Property;

use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use SYSOTEL\APP\Common\Enums\CMS\PropertyCreationType;
use SYSOTEL\APP\Common\Enums\CMS\PropertyStarRating;
use SYSOTEL\APP\Common\Enums\CMS\PropertyType;
use SYSOTEL\APP\Common\Enums\Currency;
use SYSOTEL\APP\Common\Enums\CMS\PropertyStatus;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\Address;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;
use SYSOTEL\APP\Common\Mongo\CMS\Support\NumericIdGenerator;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;

/**
 * @ODM\Document(
 *     collection="properties",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class Property extends BaseDocument
{
    use SlugGenerators;
    use HasAccountId;
    use CanResolveIntegerID;
    use HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var int
     * @ODM\Id(strategy="NONE", type="int"))
     */
    public $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $slug;

    /**
     * @var STRING
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
     * @var array
     * @ODM\Field(type="collection")
     */
    public $allowedBookingTypes;

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
     * @var string
     * @ODM\Field(type="string")
     */
    public $propertyLabel;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $spaceLabel;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $productLabel;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $shortDescription;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $longDescription;

    /**
     * @var PropertyStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyStatus::class)
     */
    public $status;

    /**
     * @var PropertyCreationType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyCreationType::class)
     */
    public $creationType;

    /**
     * @var UserReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference::class)
     */
    public $creator;


    protected $defaults = [
        'baseCurrency' => Currency::INR,
        'status'       => PropertyStatus::ACTIVE,
    ];

    /**
     * Generates primary key
     * Creates slug and accountSlug
     *
     * @ODM\PrePersist
     */
    public function prePersist()
    {
        $this->id = NumericIdGenerator::get($this);
        $this->slug = $this->generateSlug();
        $this->accountSlug = $this->generateAccountSlug();
    }

    /**
     * @return string
     */
    public function propertyLabel(): string
    {
        return $this->propertyLabel;
    }

    /**
     * @return string
     */
    public function spaceLabel(): string
    {
        return $this->spaceLabel;
    }

    /**
     * @return string
     */
    public function productLabel(): string
    {
        return $this->productLabel;
    }
}
