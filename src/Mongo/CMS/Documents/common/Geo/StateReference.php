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
     * @param State $state
     * @return StateReference
     */
    public static function createFromState(State $state): StateReference
    {
        $instance = new self;
        $instance->id = new ObjectId($state->getId());
        $instance->name = $state->getName();
        $instance->slug = $state->getSlug();
        return $instance;
    }

    /**
     * @return ObjectId
     */
    public function getId(): ObjectId
    {
        return $this->id instanceof ObjectId ? $this->id : new ObjectId($this->id);
    }

    /**
     * @param ObjectId $id
     * @return StateReference
     */
    public function setId(ObjectId $id): StateReference
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
     * @return StateReference
     */
    public function setName(string $name): StateReference
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
     * @return StateReference
     */
    public function setSlug(string $slug): StateReference
    {
        $this->slug = $slug;
        return $this;
    }
}
