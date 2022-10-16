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
    protected $infantAgeThreshold;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $childAgeThreshold;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $freeChildAgeThreshold;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $noOfFreeChildGranted;

    /**
     * @return int
     */
    public function getInfantAgeThreshold(): int
    {
        return $this->infantAgeThreshold;
    }

    /**
     * @param int $infantAgeThreshold
     * @return AgePolicy
     */
    public function setInfantAgeThreshold(int $infantAgeThreshold): AgePolicy
    {
        $this->infantAgeThreshold = $infantAgeThreshold;
        return $this;
    }

    /**
     * @return int
     */
    public function getChildAgeThreshold(): int
    {
        return $this->childAgeThreshold;
    }

    /**
     * @param int $childAgeThreshold
     * @return AgePolicy
     */
    public function setChildAgeThreshold(int $childAgeThreshold): AgePolicy
    {
        $this->childAgeThreshold = $childAgeThreshold;
        return $this;
    }

    /**
     * @return int
     */
    public function getFreeChildAgeThreshold(): int
    {
        return $this->freeChildAgeThreshold;
    }

    /**
     * @param int $freeChildAgeThreshold
     * @return AgePolicy
     */
    public function setFreeChildAgeThreshold(int $freeChildAgeThreshold): AgePolicy
    {
        $this->freeChildAgeThreshold = $freeChildAgeThreshold;
        return $this;
    }

    /**
     * @return int
     */
    public function getNoOfFreeChildGranted(): int
    {
        return $this->noOfFreeChildGranted;
    }

    /**
     * @param int $noOfFreeChildGranted
     * @return AgePolicy
     */
    public function setNoOfFreeChildGranted(int $noOfFreeChildGranted): AgePolicy
    {
        $this->noOfFreeChildGranted = $noOfFreeChildGranted;
        return $this;
    }

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

        return "{$this->noOfFreeChildGranted} $guest below age {$this->freeChildAgeThreshold} {$is} allowed for FREE when used existing bedding.";
    }

    /**
     * @return string[]
     */
    public function fullDescriptionArray(): array
    {
        return [
            $this->infantAgeDefinition(),
            $this->childAgeDefinition(),
            $this->adultAgeDefinition(),
        ];
    }
}
