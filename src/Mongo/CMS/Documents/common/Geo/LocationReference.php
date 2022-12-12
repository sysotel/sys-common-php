<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Location\Location;

/**
 * @ODM\EmbeddedDocument
 */
class LocationReference extends EmbeddedDocument
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
     * @param Location $location
     * @return static
     */
    public static function createFromLocation(Location $location): static
    {
        $instance = new self;
        $instance->id = $location->getId();
        $instance->name = $location->getName();
        return $instance;
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
     */
    public function setId(ObjectId $id): void
    {
        $this->id = $id;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
