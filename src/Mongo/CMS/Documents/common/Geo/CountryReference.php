<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use MongoDB\BSON\ObjectId;
use MongoDB\Operation\Count;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\Area;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\Country;

/**
 * @ODM\EmbeddedDocument
 */
class CountryReference extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @param ObjectId|string $id
     * @param string $name
     */
    public function __construct(ObjectId|string $id, string $name)
    {
        $this->id = is_string($id) ? new ObjectId($id) : $id;
        $this->name = $name;
    }

    /**
     * @param Country $country
     * @return CountryReference
     */
    public static function createFromCountry(Country $country): CountryReference
    {
        return new self(
            $country->getId(),
            $country->getName()
        );
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return CountryReference
     */
    public function setId(string $id): CountryReference
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
     * @return CountryReference
     */
    public function setName(string $name): CountryReference
    {
        $this->name = $name;
        return $this;
    }
}
