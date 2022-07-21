<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
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
    public $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @param Area $area
     * @return AreaReference
     */
    public static function createFromArea(Area $area): AreaReference
    {
        return new self([
            'id' => new ObjectId($area->id),
            'name' => $area->name,
        ]);
    }
}
