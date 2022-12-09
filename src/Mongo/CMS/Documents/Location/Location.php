<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Location;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CityReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference;

/**
 * @ODM\Document(collection="locations")
 */
class Location extends BaseDocument
{
    /**
     * @var string
     * @ODM\Id
     */
    protected $id;

    /**
     * @var ?LocationType
     * @ODM\Field(type="int", enumType=SYSOTEL\APP\Common\Enums\CMS\LocationType::class)
     */
    protected $type;

    /**
     * @var string
     * @ODM\Field
     */
    protected $code;

    /**
     * @var string
     * @ODM\Field
     */
    protected $slug;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $postalCode;

    /**
     * @var GeoPoint
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
     * @var CountryReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference::class)
     */
    private $country;

    /**
     * @var StateReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference::class)
     */
    private $state;

    /**
     * @var CityReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CityReference::class)
     */
    private $city;

    public function __construct()
    {
        $this->channelDetails = new ArrayCollection;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Location
     */
    public function setId(string $id): Location
    {
        $this->id = $id;
        return $this;
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
     * @return Location
     */
    public function setType(?LocationType $type): Location
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Location
     */
    public function setCode(string $code): Location
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Location
     */
    public function setSlug(string $slug): Location
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Location
     */
    public function setName(string $name): Location
    {
        $this->name = $name;
        return $this;
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
     * @return Location
     */
    public function setPostalCode(?string $postalCode): Location
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return GeoPoint
     */
    public function getGeoPoint(): GeoPoint
    {
        return $this->geoPoint;
    }

    /**
     * @param GeoPoint $geoPoint
     * @return Location
     */
    public function setGeoPoint(GeoPoint $geoPoint): Location
    {
        $this->geoPoint = $geoPoint;
        return $this;
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
     * @return Location
     */
    public function setSearchKeywords(array $searchKeywords): Location
    {
        $this->searchKeywords = $searchKeywords;
        return $this;
    }

    /**
     * @return ArrayCollection|ChannelLocationDetailsItem
     */
    public function getChannelDetails(): ChannelLocationDetailsItem|ArrayCollection
    {
        return $this->channelDetails;
    }

    /**
     * @param ArrayCollection|ChannelLocationDetailsItem $channelDetails
     * @return Location
     */
    public function setChannelDetails(ChannelLocationDetailsItem|ArrayCollection $channelDetails): Location
    {
        $this->channelDetails = $channelDetails;
        return $this;
    }

    /**
     * @return CountryReference
     */
    public function getCountry(): CountryReference
    {
        return $this->country;
    }

    /**
     * @param CountryReference $country
     * @return Location
     */
    public function setCountry(CountryReference $country): Location
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return StateReference
     */
    public function getState(): StateReference
    {
        return $this->state;
    }

    /**
     * @param StateReference $state
     * @return Location
     */
    public function setState(StateReference $state): Location
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return CityReference
     */
    public function getCity(): CityReference
    {
        return $this->city;
    }

    /**
     * @param CityReference $city
     * @return Location
     */
    public function setCity(CityReference $city): Location
    {
        $this->city = $city;
        return $this;
    }
}
