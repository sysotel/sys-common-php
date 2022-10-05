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
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyRepository;
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
    use HasAccountId, HasLabelProperties, HasTimestamps;
    use SlugGenerators, CanResolveIntegerID, HasDefaultAttributes;

    /**
     * @var int
     * @ODM\Id(strategy="NONE", type="int"))
     */
    protected $id;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $slug;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $accountSlug;

    /**
     * @var ?Currency
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\Currency::class)
     */
    protected $baseCurrency;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $displayName;

    /**
     * @var ?PropertyStarRating
     * @ODM\Field(type="int", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyStarRating::class)
     */
    protected $starRating;

    /**
     * @var ?PropertyType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyType::class)
     */
    protected $type;

    /**
     * @var array
     * @ODM\Field(type="collection")
     */
    protected $allowedBookingTypes = [];

    /**
     * @var ?Address
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\Address::class)
     */
    protected $address;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $noOfSpaces;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $noOfFloors;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $buildYear;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $shortDescription;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $longDescription;

    /**
     * @var PropertyStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyStatus::class)
     */
    protected $status;

    /**
     * @var PropertyCreationType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyCreationType::class)
     */
    protected $creationType;

    /**
     * @var UserReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference::class)
     */
    protected $creator;


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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Property
     */
    public function setId(int $id): Property
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     * @return Property
     */
    public function setSlug(?string $slug): Property
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountSlug(): ?string
    {
        return $this->accountSlug;
    }

    /**
     * @param string|null $accountSlug
     * @return Property
     */
    public function setAccountSlug(?string $accountSlug): Property
    {
        $this->accountSlug = $accountSlug;
        return $this;
    }

    /**
     * @return Currency|null
     */
    public function getBaseCurrency(): ?Currency
    {
        return $this->baseCurrency;
    }

    /**
     * @param Currency|null $baseCurrency
     * @return Property
     */
    public function setBaseCurrency(?Currency $baseCurrency): Property
    {
        $this->baseCurrency = $baseCurrency;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param string|null $displayName
     * @return Property
     */
    public function setDisplayName(?string $displayName): Property
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return PropertyStarRating|null
     */
    public function getStarRating(): ?PropertyStarRating
    {
        return $this->starRating;
    }

    /**
     * @param PropertyStarRating|null $starRating
     * @return Property
     */
    public function setStarRating(?PropertyStarRating $starRating): Property
    {
        $this->starRating = $starRating;
        return $this;
    }

    /**
     * @return PropertyType|null
     */
    public function getType(): ?PropertyType
    {
        return $this->type;
    }

    /**
     * @param PropertyType|null $type
     * @return Property
     */
    public function setType(?PropertyType $type): Property
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedBookingTypes(): array
    {
        return $this->allowedBookingTypes;
    }

    /**
     * @param array $allowedBookingTypes
     * @return Property
     */
    public function setAllowedBookingTypes(array $allowedBookingTypes): Property
    {
        $this->allowedBookingTypes = $allowedBookingTypes;
        return $this;
    }

    /**
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address|null $address
     * @return Property
     */
    public function setAddress(?Address $address): Property
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNoOfSpaces(): ?int
    {
        return $this->noOfSpaces;
    }

    /**
     * @param int|null $noOfSpaces
     * @return Property
     */
    public function setNoOfSpaces(?int $noOfSpaces): Property
    {
        $this->noOfSpaces = $noOfSpaces;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNoOfFloors(): ?int
    {
        return $this->noOfFloors;
    }

    /**
     * @param int|null $noOfFloors
     * @return Property
     */
    public function setNoOfFloors(?int $noOfFloors): Property
    {
        $this->noOfFloors = $noOfFloors;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getBuildYear(): ?int
    {
        return $this->buildYear;
    }

    /**
     * @param int|null $buildYear
     * @return Property
     */
    public function setBuildYear(?int $buildYear): Property
    {
        $this->buildYear = $buildYear;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     * @return Property
     */
    public function setShortDescription(string $shortDescription): Property
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongDescription(): string
    {
        return $this->longDescription;
    }

    /**
     * @param string $longDescription
     * @return Property
     */
    public function setLongDescription(string $longDescription): Property
    {
        $this->longDescription = $longDescription;
        return $this;
    }

    /**
     * @return PropertyStatus
     */
    public function getStatus(): PropertyStatus
    {
        return $this->status;
    }

    /**
     * @param PropertyStatus $status
     * @return Property
     */
    public function setStatus(PropertyStatus $status): Property
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return PropertyCreationType
     */
    public function getCreationType(): PropertyCreationType
    {
        return $this->creationType;
    }

    /**
     * @param PropertyCreationType $creationType
     * @return Property
     */
    public function setCreationType(PropertyCreationType $creationType): Property
    {
        $this->creationType = $creationType;
        return $this;
    }

    /**
     * @return UserReference
     */
    public function getCreator(): UserReference
    {
        return $this->creator;
    }

    /**
     * @param UserReference $creator
     * @return Property
     */
    public function setCreator(UserReference $creator): Property
    {
        $this->creator = $creator;
        return $this;
    }

    /**
     * @return PropertyRepository
     */
    public static function repository(): PropertyRepository
    {
        return parent::repository();
    }
}
