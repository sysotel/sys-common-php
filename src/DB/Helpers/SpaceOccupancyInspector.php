<?php

namespace SYSOTEL\APP\Common\DB\Helpers;

use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\Enums\CMS\AgeCode;

/**
 * Ensure that the passed $occupancy model
 * has values in all the fields
*/
class SpaceOccupancyInspector
{
    private SpaceOccupancy $occupancy;

    public function __construct(SpaceOccupancy $occupancy)
    {
        $this->occupancy = $occupancy;
    }

    /**
     * maxCount and baseCount should exist
     * and maxCount > baseCount
     *
     * @return bool
     */
    public function isExtraGuestAllowed(): bool
    {
        return is_numeric($this->occupancy->maxCount) &&
            is_numeric($this->occupancy->baseCount) &&
            $this->occupancy->maxCount > $this->occupancy->baseCount;
    }

    /**
     * Extra guest should be allowed
     * maxAdultCount value should exist,
     * and it should be greater than 1
     *
     * @return bool
     */
    public function isExtraAdultAllowed(): bool
    {
        return $this->isExtraGuestAllowed()
            && is_numeric($this->occupancy->maxAdultCount)
            && $this->occupancy->maxAdultCount > 1;
    }

    /**
     * Extra guest should be allowed
     * maxAdultCount value should exist,
     * and it should be greater than 1
     *
     * @return bool
     */
    public function isExtraChildAllowed(): bool
    {
        return $this->isExtraGuestAllowed()
            && is_numeric($this->occupancy->maxChildCount)
            && $this->occupancy->maxChildCount > 1;
    }

    /**
     * @return int[]
     */
    public function baseRateCounts(): array
    {
        if(
            is_numeric($this->occupancy->minCount) &&
            is_numeric($this->occupancy->baseCount) &&
            $this->occupancy->minCount > 0 &&
            $this->occupancy->baseCount >= $this->occupancy->minCount
        ) {
            return range($this->occupancy->minCount, $this->occupancy->baseCount);
        }

        return [];
    }

    /**
     * @param AgeCode|string $ageCode
     * @return array
     */
    public function extraRateCounts(AgeCode|string $ageCode): array
    {
        if (is_string($ageCode)) {
            $ageCode = AgeCode::from($ageCode);
        }

        if (($this->occupancy->maxCount - $this->occupancy->baseCount) > 0) {
            return range(1, ($this->occupancy->maxCount - $this->occupancy->baseCount));
        }

        return [];
    }

    /**
     * @return array
     */
    public function baseRateCountDetails(): array
    {
        $items = [];
        foreach ($this->baseRateCounts() as $count) {
            $items[] = [
                'count' => $count,
                'label' => match ($count) {
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
        if (is_string($ageCode)) {
            $ageCode = AgeCode::from($ageCode);
        }

        $items = [];
        $prefix = match ($ageCode) {
            AgeCode::ADULT => 'Extra Adult ',
            AgeCode::CHILD => 'Extra Child ',
            default => 'Extra Person '
        };

        foreach ($this->extraRateCounts($ageCode) as $count) {
            $items[] = [
                'count' => $count,
                'label' => "$prefix $count",
                'ageCode' => $ageCode
            ];
        }

        return $items;
    }

    /**
     * @return string
     */
    public function baseRateLabelString(): string
    {
        $string = '';

        foreach ($this->baseRateCountDetails() as $baseRateCountDetail) {
            $string .= $baseRateCountDetail['label'];
        }

        return trim($string);
    }

    /**
     * @param bool $lite
     * @return string
     */
    public function extraRateLabelString(bool $lite = true)
    {
        $str = '';

        if ($lite) {
            if ($this->isExtraAdultAllowed()) {
                $str .= 'Extra Adult';
            }

            if ($this->isExtraChildAllowed()) {
                $str .= 'Extra Child';
            }
        } else {
            foreach ($this->extraRateCountDetails() as $extraRateCountDetail) {
                $str .= $extraRateCountDetail['label'] . ' ';
            }
        }

        return trim($str);
    }

    /**
     * @return string
     */
    public function maxGuestsString(): string
    {
        if($this->occupancy->maxCount) {
            $postfix = $this->occupancy->maxCount > 1 ? 'Guests' : 'Guest';

            return $this->occupancy->maxCount . ' ' . $postfix;
        }

        return '';
    }
}
