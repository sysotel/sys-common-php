<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Location;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;

/**
 * @ODM\Document(collection="locations")
 * @ODM\HasLifecycleCallbacks
 */
class Location extends BaseDocument
{
    use HasObjectIdKey, HasTimestamps;

    /**
     * @var ?LocationType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\LocationType::class)
     */
    protected $type;

    /**
     * @var ?string
     * @ODM\Field
     */
    protected $code;

    /**
     * @var ?string
     * @ODM\Field
     */
    protected $slug;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $postalCode;

    /**
     * @var ?GeoPoint
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\GeoLocation::class)
     */
    protected $geoPoint;

    /**
     * @var array
     * @ODM\Field(type="collection")
     */
    protected $searchKeywords = [];

    /**
     * @var ChannelLocationDetailsItem
     * @ODM\EmbedMany  (targetDocument=ChannelLocationDetailsItem::class)
     */
    protected $channelDetails;

    /**
     * @var ?LocationReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $country;

    /**
     * @var ?LocationReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $state;

    /**
     * @var ?LocationReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\LocationReference::class)
     */
    private $city;

    public function __construct()
    {
        $this->channelDetails = new ArrayCollection;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return LocationType|null
     */
    public function getType(): ?LocationType
    {
        return $this->type;
    }

    /**
     * @param LocationType|null $type
     */
    public function setType(?LocationType $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
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
     */
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     */
    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return GeoPoint|null
     */
    public function getGeoPoint(): ?GeoPoint
    {
        return $this->geoPoint;
    }

    /**
     * @param GeoPoint|null $geoPoint
     */
    public function setGeoPoint(?GeoPoint $geoPoint): void
    {
        $this->geoPoint = $geoPoint;
    }

    /**
     * @return array
     */
    public function getSearchKeywords(): array
    {
        return $this->searchKeywords;
    }

    /**
     * @param array $searchKeywords
     */
    public function setSearchKeywords(array $searchKeywords): void
    {
        $this->searchKeywords = $searchKeywords;
    }

    /**
     * @return ChannelLocationDetailsItem
     */
    public function getChannelDetails(): ChannelLocationDetailsItem|ArrayCollection
    {
        return $this->channelDetails;
    }

    /**
     * @param ChannelLocationDetailsItem $channelDetails
     */
    public function setChannelDetails(ChannelLocationDetailsItem|ArrayCollection $channelDetails): void
    {
        $this->channelDetails = $channelDetails;
    }

    /**
     * @return LocationReference|null
     */
    public function getCountry(): ?LocationReference
    {
        return $this->country;
    }

    /**
     * @param LocationReference|null $country
     */
    public function setCountry(?LocationReference $country): void
    {
        $this->country = $country;
    }

    /**
     * @return LocationReference|null
     */
    public function getState(): ?LocationReference
    {
        return $this->state;
    }

    /**
     * @param LocationReference|null $state
     */
    public function setState(?LocationReference $state): void
    {
        $this->state = $state;
    }

    /**
     * @return LocationReference|null
     */
    public function getCity(): ?LocationReference
    {
        return $this->city;
    }

    /**
     * @param LocationReference|null $city
     */
    public function setCity(?LocationReference $city): void
    {
        $this->city = $city;
    }
}
