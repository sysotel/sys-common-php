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
     * @var InventoryAccuracy
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\InventoryAccuracy::class)
     */
    public $accuracy;

    /**
     * @var ArrayCollection & int[]
     * @ODM\Field(type="collection")
     */
    public $bookingSlots = [];
}
