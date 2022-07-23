<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use MongoDB\BSON\ObjectId;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Geo\State;

/**
 * @ODM\EmbeddedDocument
 */
class StateReference extends EmbeddedDocument
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
     * @param State $state
     * @return StateReference
     */
    public static function createFromState(State $state): StateReference
    {
        return new self([
            'id' => new ObjectId($state->id),
            'name' => $state->name,
        ]);
    }
}
