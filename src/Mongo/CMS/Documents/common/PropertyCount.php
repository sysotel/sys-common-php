<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 */
class PropertyCount extends EmbeddedDocument
{
    /**
     * @var ArrayCollection & PropertyCountItem
     * @ODM\EmbedMany (targetDocument=PropertyCountItem::class)
     */
    public $items;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $count;

    /**
     * CONSTRUCTOR
     */
    public function __construct(array $attributes = [])
    {
        $this->items = new ArrayCollection;

        parent::__construct($attributes);
    }
}
