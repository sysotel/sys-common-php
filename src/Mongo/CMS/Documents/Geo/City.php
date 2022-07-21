<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Delta4op\MongoODM\Facades\DocumentManager;
use Delta4op\MongoODM\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\CountryReference;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\StateReference;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\CityRepository;
use function SYSOTEL\APP\Common\Functions\arrayFilter;
use function SYSOTEL\APP\Common\Functions\toArrayOrNull;

/**
 * @ODM\Document(
 *     collection="geoCities",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\CityRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class City extends LocationItem
{
    use HasTimestamps;

    /**
     * @var CountryReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\CountryReference::class)
     */
    public $country;

    /**
     * @var StateReference
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\StateReference::class)
     */
    public $state;

    /**
     * User Repository
     *
     * @return CityRepository
     */
    public static function repository(): CityRepository
    {
        return DocumentManager::getRepository(self::class);
    }
}
