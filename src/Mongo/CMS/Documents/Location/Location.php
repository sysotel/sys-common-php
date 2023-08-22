<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Location;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\ChannelId;
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
 */
abstract class Location extends BaseDocument
{
    use HasObjectIdKey, HasTimestamps;

    public abstract function getType(): LocationType;

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
     * @var Collection & ChannelLocationDetailsItem[]
     * @ODM\EmbedMany  (targetDocument=ChannelLocationDetailsItem::class)
     */
    protected $channelDetails;

    /**
     * @var Collection<LocationChannel>
     * @ODM\EmbedMany  (targetDocument=ChannelLocationDetailsItem::class)
     */
    protected $channels;

    public function __construct()
    {
        $this->channelDetails = new ArrayCollection;
        $this->channels = new ArrayCollection;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
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
     * @return Location
     */
    public function setCategorySlug(?string $categorySlug): static
    {
        $this->categorySlug = $categorySlug;
        return $this;
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
     * @return Location
     */
    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
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
     * @return Location
     */
    public function setGeoPoint(?GeoPoint $geoPoint): static
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
    public function setSearchKeywords(array $searchKeywords): static
    {
        $this->searchKeywords = $searchKeywords;
        return $this;
    }

    /**
     * @return ChannelLocationDetailsItem[]
     */
    public function getChannelDetails(): Collection
    {
        return $this->channelDetails;
    }

    /**
     * @param ChannelLocationDetailsItem $channelDetails
     * @return Location
     */
    public function addChannelDetails(ChannelLocationDetailsItem $channelDetails): static
    {
        $this->channelDetails->add($channelDetails);
        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getChannels(): ArrayCollection|Collection
    {
        return $this->channels;
    }

    /**
     * @param LocationChannel $channel
     * @return Location
     */
    public function addLocationChannel(LocationChannel $channel): static
    {
        $this->channels->add($channel);
        return $this;
    }

    /**
     * @param ChannelId $channelId
     * @return LocationChannel|null
     */
    public function getChannel(ChannelId $channelId): ?LocationChannel
    {
        foreach($this->channels as $channel) {
            if($channel->getChannelId() === $channelId) {
                return $channel;
            }
        }

        return null;
    }

    public static function repository(): LocationRepository
    {
        return parent::repository();
    }
}
