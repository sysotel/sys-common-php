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
    public $baseCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $maxCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $minAdultCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $maxAdultCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $minChildCount;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $maxChildCount;

    /**
     * @return array
     */
    public function baseRateCounts(): array
    {
        if($this->baseCount > 0) {
            return range(1, $this->baseCount);
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
}
