<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Delta4op\Mongodb\Traits\CanResolveStringID;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(
 *     collection="geoCountries",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\CountryRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class Country extends LocationItem
{
    use HasTimestamps, CanResolveStringID;

    /**
     * @var string
     * @ODM\Id(type="string",strategy="none")
     */
    public $id;
}
