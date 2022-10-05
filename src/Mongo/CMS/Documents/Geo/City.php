<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Delta4op\Mongodb\Traits\CanResolveStringID;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\CityRepository;

/**
 * @ODM\Document(
 *     collection="geoCities",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\CityRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class City extends LocationItem
{
    use CanResolveStringID, HasTimestamps;

    /**
     * @var CountryReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference::class)
     */
    protected $country;

    /**
     * @var StateReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference::class)
     */
    protected $state;

    /**
     * @return CountryReference
     */
    public function getCountry(): CountryReference
    {
        return $this->country;
    }

    /**
     * @param CountryReference $country
     * @return City
     */
    public function setCountry(CountryReference $country): City
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
     * @return City
     */
    public function setState(StateReference $state): City
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return CityRepository
     */
    public static function repository(): CityRepository
    {
        return parent::repository();
    }
}
