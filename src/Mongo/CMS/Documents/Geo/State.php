<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Delta4op\Mongodb\Facades\DocumentManager;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\CountryReference;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\StateRepository;
use function SYSOTEL\APP\Common\Functions\arrayFilter;
use function SYSOTEL\APP\Common\Functions\toArrayOrNull;

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
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\CountryReference::class)
     */
    public $country;

    /**
     * @var string
     * @ODM\Field
     */
    public $code;

    /**
     * User Repository
     *
     * @return StateRepository
     */
    public static function repository(): StateRepository
    {
        return DocumentManager::getRepository(self::class);
    }
}
