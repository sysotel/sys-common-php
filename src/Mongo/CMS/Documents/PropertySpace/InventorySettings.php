<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\InventoryAccuracy;

/**
 * @ODM\EmbeddedDocument
 */
class InventorySettings extends EmbeddedDocument
{
    /**
     * @var ?InventoryAccuracy
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\InventoryAccuracy::class)
     */
    protected $accuracy;

    /**
     * @var ArrayCollection & int[]
     * @ODM\Field(type="collection")
     */
    protected $hourlySlots = [];

    /**
     * @return InventoryAccuracy|null
     */
    public function getAccuracy(): ?InventoryAccuracy
    {
        return $this->accuracy;
    }

    /**
     * @param InventoryAccuracy|null $accuracy
     * @return InventorySettings
     */
    public function setAccuracy(?InventoryAccuracy $accuracy): InventorySettings
    {
        $this->accuracy = $accuracy;
        return $this;
    }

    /**
     * @return ArrayCollection|int[]
     */
    public function getHourlySlots(): array|ArrayCollection
    {
        return $this->hourlySlots;
    }

    /**
     * @param ArrayCollection|int[] $hourlySlots
     * @return InventorySettings
     */
    public function setHourlySlots(array|ArrayCollection $hourlySlots): InventorySettings
    {
        $this->hourlySlots = $hourlySlots;
        return $this;
    }
}
