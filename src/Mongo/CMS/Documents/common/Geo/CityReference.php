<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\City;

/**
 * @ODM\EmbeddedDocument
 */
class CityReference extends EmbeddedDocument
{
    /**
     * @var ObjectId
     * @ODM\Field(type="object_id")
     */
    protected $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $slug;

    /**
     * @param City $city
     * @return CityReference
     */
    public static function createFromCity(City $city): CityReference
    {
        return self::make()
            ->setId(new ObjectId($city->id))
            ->setName($city->name)
            ->setSlug($city->slug);
    }

    /**
     * @return ObjectId
     */
    public function getId(): ObjectId
    {
        return $this->id;
    }

    /**
     * @param ObjectId $id
     * @return CityReference
     */
    public function setId(ObjectId $id): CityReference
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CityReference
     */
    public function setName(string $name): CityReference
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return CityReference
     */
    public function setSlug(string $slug): CityReference
    {
        $this->slug = $slug;
        return $this;
    }
}
