<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 */
class PropertyCount extends EmbeddedDocument
{
    /**
     * @var ArrayCollection & PropertyCountItem[]
     * @ODM\EmbedMany (targetDocument=PropertyCountItem::class)
     */
    public $items;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    public $count;

    /**
     * CONSTRUCTOR
     */
    public function __construct()
    {
        $this->items = new ArrayCollection;
    }

    /**
     * @return ArrayCollection|PropertyCountItem
     */
    public function getItems(): PropertyCountItem|ArrayCollection
    {
        return $this->items;
    }

    /**
     * @param PropertyCountItem $item
     * @return $this
     */
    public function addItem(PropertyCountItem $item): self
    {
        $this->items->add($item);
        return $this;
    }

    /**
     * @param ArrayCollection|array $items
     * @return PropertyCount
     */
    public function setItems(ArrayCollection|array $items): PropertyCount
    {
        $this->items = $items instanceof ArrayCollection ? $items : new ArrayCollection($items);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param ?int $count
     * @return PropertyCount
     */
    public function setCount(?int $count): PropertyCount
    {
        $this->count = $count;
        return $this;
    }
}
