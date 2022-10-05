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
     * @param State $state
     * @return StateReference
     */
    public static function createFromState(State $state): StateReference
    {
        return new self($state->getId(), $state->getName(), $state->getSlug());
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

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
