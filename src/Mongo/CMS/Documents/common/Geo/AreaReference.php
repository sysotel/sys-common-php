<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\Area;

/**
 * @ODM\EmbeddedDocument
 */
class AreaReference extends EmbeddedDocument
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
     * @param Area $area
     * @return AreaReference
     */
    public static function createFromArea(Area $area): AreaReference
    {
        $instance = new self;
        $instance->id = new ObjectId($area->getId());
        $instance->name = $area->getName();
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
     * @return AreaReference
     */
    public function setId(ObjectId $id): AreaReference
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
     * @return AreaReference
     */
    public function setName(string $name): AreaReference
    {
        $this->name = $name;
        return $this;
    }
}
