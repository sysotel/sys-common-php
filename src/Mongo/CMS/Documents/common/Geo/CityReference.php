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
     * @param ObjectId|string $id
     * @param string $name
     * @param string $slug
     */
    public function __construct(ObjectId|string $id, string $name, string $slug)
    {
        $this->id = is_string($id) ? new ObjectId($id) : $id;
        $this->name = $name;
        $this->slug = $slug;
    }

    /**
     * @param City $city
     * @return CityReference
     */
    public static function createFromCity(City $city): CityReference
    {
        return new self(
            $city->getId(),
            $city->getName(),
            $city->getSlug(),
        );
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
