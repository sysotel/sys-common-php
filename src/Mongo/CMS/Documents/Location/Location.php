<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Location;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\LocationType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\GeoPoint;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\LocationRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;

/**
 * @ODM\Document(
 *     collection="locations",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\LocationRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 * @ODM\InheritanceType("SINGLE_COLLECTION")
 * @ODM\DiscriminatorField("type")
 * @ODM\DiscriminatorMap({
 *     "COUNTRY":SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types\Country::class,
 *     "STATE":SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types\State::class,
 *     "CITY":SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types\City::class,
 *     "AREA":SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Types\Area::class,
 * })
 */class Location extends BaseDocument
{
    use HasObjectIdKey, HasTimestamps;

    /**
     * @var ?string
     * @ODM\Field
     */
    protected $code;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $categorySlug;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $name;

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
    public function getCategorySlug(): ?string
    {
        return $this->categorySlug;
    }

    /**
     * @param string|null $categorySlug
     */
    public function setCategorySlug(?string $categorySlug): void
    {
        $this->categorySlug = $categorySlug;
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

    public static function repository(): LocationRepository
    {
        return parent::repository();
    }
}
