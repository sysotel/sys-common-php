<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo;

use Delta4op\MongoODM\Facades\DocumentManager;
use Delta4op\MongoODM\Traits\CanResolveStringID;
use Delta4op\MongoODM\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Illuminate\Support\Collection;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\CountryRepository;

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

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'createdAt'       => $this->createdAt,
            'updatedAt'       => $this->updatedAt,
        ]);
    }

    /**
     * User Repository
     *
     * @return CountryRepository
     */
    public static function repository(): CountryRepository
    {
        return DocumentManager::getRepository(self::class);
    }
}
