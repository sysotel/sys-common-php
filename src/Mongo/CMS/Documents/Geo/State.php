<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference;

/**
 * @ODM\Document(
 *     collection="geoStates",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\StateRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class State extends LocationItem
{
    use HasTimestamps;

    /**
     * @var CountryReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference::class)
     */
    protected $country;

    /**
     * @return CountryReference
     */
    public function getCountry(): CountryReference
    {
        return $this->country;
    }

    /**
     * @param CountryReference $country
     * @return State
     */
    public function setCountry(CountryReference $country): State
    {
        $this->country = $country;
        return $this;
    }
}
