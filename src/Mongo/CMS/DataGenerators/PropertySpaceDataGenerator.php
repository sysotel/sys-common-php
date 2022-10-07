<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Enums\CMS\AgeCode;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

class PropertySpaceDataGenerator
{
    use Helpers;

    /**
     * @var PropertySpace
    */
    protected PropertySpace $space;

    /**
     * @param PropertySpace $space
     */
    protected function __construct(PropertySpace $space)
    {
        $this->space = $space;
    }

    /**
     * @return PropertySpaceDataGenerator
     */
    public function addBasicDetails(): PropertySpaceDataGenerator
    {
        $data = [
            'id' => $this->space->getId(),
            'accountId' => $this->space->getAccountId(),
            'internalName' => $this->space->getInternalName(),
            'displayName' => $this->space->getDisplayName(),
            'status' => $this->space->getStatus(),
            'longDescription' => $this->space->getLongDescription(),
            'noOfUnits' => $this->space->getNoOfUnits(),
            'inventorySettings' => [
                'accuracy' => $this->space->getInventorySettings()->getAccuracy(),
                'hourlySlots' => $this->space->getInventorySettings()->getHourlySlots(),
            ]
        ];

        if ($this->space->getView()) {
            $data['view'] = [
                'code' => $this->space->getView()->getCode(),
                'name' => $this->space->getView()->getName(),
                'description' => $this->space->getView()->getDescription(),
            ];
        }

        if ($this->space->getSize()) {
            $data['size'] = [
                'areaSqft' => $this->space->getSize()->getAreaSqft()
            ];
        }

        return $this->appendData($data);
    }

    /**
     * @return PropertySpaceDataGenerator
     */
    public function addOccupancy(): PropertySpaceDataGenerator
    {
        $occupancy = $this->space->getOccupancy();

        return $this->appendData([
            'occupancy' => [
                'minCount' => $occupancy->getMinCount(),
                'baseCount' => $occupancy->getBaseCount(),
                'maxCount' => $occupancy->getMaxCount(),
                'minAdultCount' => $occupancy->getMinAdultCount(),
                'maxAdultCount' => $occupancy->getMaxAdultCount(),
                'minChildCount' => $occupancy->getMinChildCount(),
                'maxChildCount' => $occupancy->getMaxChildCount(),
                'baseRateCounts' => $occupancy->baseRateCounts(),
                'baseRateCountDetails' => $occupancy->baseRateCountDetails(),
                'extraAdultRateCounts' => $occupancy->extraRateCounts(AgeCode::ADULT),
                'extraAdultRateCountDETAILSs' => $occupancy->extraRateCountDetails(AgeCode::ADULT),
                'extraChildRateCounts' => $occupancy->extraRateCounts(AgeCode::CHILD),
                'extraChildRateCountDetails' => $occupancy->extraRateCountDetails(AgeCode::CHILD),
            ],
        ]);
    }
}
