<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CityReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\AreaRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertySpaceRepository;

/**
 * @ODM\Document(
 *     collection="geoAreas",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\AreaRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class Area extends LocationItem
{
    use HasTimestamps;

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

    /**
     * @return CountryReference
     */
    public function getCountry(): CountryReference
    {
        return $this->country;
    }

    /**
     * @param CountryReference $country
     * @return Area
     */
    public function setCountry(CountryReference $country): Area
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
     * @return Area
     */
    public function setState(StateReference $state): Area
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
     * @return Area
     */
    public function setCity(CityReference $city): Area
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return AreaRepository
     */
    public static function repository(): AreaRepository
    {
        return parent::repository();
    }
}
