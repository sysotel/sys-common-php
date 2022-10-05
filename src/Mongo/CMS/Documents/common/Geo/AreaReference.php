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
     * @param ObjectId|string $id
     * @param string $name
     */
    public function __construct(ObjectId|string $id, string $name)
    {
        $this->id = is_string($id) ? new ObjectId($id) : $id;
        $this->name = $name;
    }

    /**
     * @param Area $area
     * @return AreaReference
     */
    public static function createFromArea(Area $area): AreaReference
    {
        return new self(
            $area->getId(),
            $area->getName()
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
