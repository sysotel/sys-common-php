<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class AgePolicy extends EmbeddedDocument
{
    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $infantAgeThreshold;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $childAgeThreshold;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $freeChildThreshold;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $noOfFreeChildGranted;

    /**
     * @return string
     */
    public function infantAgeDefinition(): string
    {
        return "Guest with age {$this->infantAgeThreshold} or below is considered an infant.";
    }

    /**
     * @return string
     */
    public function childAgeDefinition(): string
    {
        return "Guest with age between {$this->infantAgeThreshold} and {$this->childAgeThreshold} is considered a child.";
    }

    /**
     * @return string
     */
    public function adultAgeDefinition(): string
    {
        return "Guest with age above {$this->childAgeThreshold} is considered an adult.";
    }

    /**
     * @return string
     */
    public function freeChildDefinition(): string
    {
        $guest = $this->noOfFreeChildGranted != 1 ? 'guests' : 'guest';
        $is = $this->noOfFreeChildGranted != 1 ? 'area' : 'is';

        return "{$this->noOfFreeChildGranted} $guest below age {$this->freeChildThreshold} {$is} allowed for FREE when used existing bedding.";
    }
}
