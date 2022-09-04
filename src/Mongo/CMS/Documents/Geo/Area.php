<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CityReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CountryReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;

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
    public $country;

    /**
     * @var StateReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\StateReference::class)
     */
    public $state;

    /**
     * @var CityReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\CityReference::class)
     */
    public $city;
}
