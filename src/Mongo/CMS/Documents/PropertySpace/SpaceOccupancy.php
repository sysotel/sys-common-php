<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\AgeCode;

/**
 * @ODM\EmbeddedDocument
 */
class SpaceOccupancy extends EmbeddedDocument
{

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $minCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $baseCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $maxCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $minAdultCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $maxAdultCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $minChildCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $maxChildCount;

    /**
     * @return array
     */
    public function baseRateCounts(): array
    {
        if($this->minCount > 0 && $this->baseCount >= $this->minCount) {
            return range($this->minCount, $this->baseCount);
        }
        return [];
    }

    /**
     * @return array
     */
    public function baseRateCountDetails(): array
    {
        $items = [];
        foreach($this->baseRateCounts() as $count) {
            $items[] = [
                'count' => $count,
                'label' => match($count) {
                    1 => 'Single',
                    2 => 'Double',
                    3 => 'Triple',
                    4 => 'Quad',
                    default => "$count Person",
                }
            ];
        }

        return $items;
    }

    /**
     * @param AgeCode|string $ageCode
     * @return array
     */
    public function extraRateCountDetails(AgeCode|string $ageCode): array
    {
        if(is_string($ageCode)) {
            $ageCode = AgeCode::from($ageCode);
        }

        $items = [];
        $prefix = match($ageCode) {
            AgeCode::ADULT => 'Extra Adult ',
            AgeCode::CHILD => 'Extra Child ',
            default => 'Extra Person '
        };

        foreach($this->extraRateCounts($ageCode) as $count) {
            $items[] = [
                'count' => $count,
                'label' => "$prefix $count",
                'ageCode' => $ageCode
            ];
        }

        return $items;
    }

    /**
     * @param AgeCode|string $ageCode
     * @return array
     */
    public function extraRateCounts(AgeCode|string $ageCode): array
    {
        if(is_string($ageCode)) {
            $ageCode = AgeCode::from($ageCode);
        }

        if(($this->maxCount - $this->baseCount) > 0) {
            return range(1, ($this->maxCount - $this->baseCount));
        }
        return [];
    }

    /**
     * @return int
     */
    public function getMinCount(): int
    {
        return $this->minCount;
    }

    /**
     * @param int $minCount
     * @return SpaceOccupancy
     */
    public function setMinCount(int $minCount): SpaceOccupancy
    {
        $this->minCount = $minCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getBaseCount(): int
    {
        return $this->baseCount;
    }

    /**
     * @param int $baseCount
     * @return SpaceOccupancy
     */
    public function setBaseCount(int $baseCount): SpaceOccupancy
    {
        $this->baseCount = $baseCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxCount(): int
    {
        return $this->maxCount;
    }

    /**
     * @param int $maxCount
     * @return SpaceOccupancy
     */
    public function setMaxCount(int $maxCount): SpaceOccupancy
    {
        $this->maxCount = $maxCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinAdultCount(): int
    {
        return $this->minAdultCount;
    }

    /**
     * @param int $minAdultCount
     * @return SpaceOccupancy
     */
    public function setMinAdultCount(int $minAdultCount): SpaceOccupancy
    {
        $this->minAdultCount = $minAdultCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxAdultCount(): int
    {
        return $this->maxAdultCount;
    }

    /**
     * @param int $maxAdultCount
     * @return SpaceOccupancy
     */
    public function setMaxAdultCount(int $maxAdultCount): SpaceOccupancy
    {
        $this->maxAdultCount = $maxAdultCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinChildCount(): int
    {
        return $this->minChildCount;
    }

    /**
     * @param int $minChildCount
     * @return SpaceOccupancy
     */
    public function setMinChildCount(int $minChildCount): SpaceOccupancy
    {
        $this->minChildCount = $minChildCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxChildCount(): int
    {
        return $this->maxChildCount;
    }

    /**
     * @param int $maxChildCount
     * @return SpaceOccupancy
     */
    public function setMaxChildCount(int $maxChildCount): SpaceOccupancy
    {
        $this->maxChildCount = $maxChildCount;
        return $this;
    }
}
