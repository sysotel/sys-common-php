<?php

namespace SYSOTEL\APP\Common\DB\ArrayGenerators;

use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\PropertyPolicies;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\Enums\CMS\AgeCode;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;

class PropertySpaceDataGenerator extends ArrayDataGenerator
{

    /**
     * @var PropertySpace
    */
    private PropertySpace $space;

    /**
     * @param PropertySpace $space
     */
    public function __construct(PropertySpace $space)
    {
        $this->space = $space;
    }


    public static function create(PropertySpace $space): static
    {
        return new static($space);
    }

    /**
     * @return PropertySpaceDataGenerator
     */
    public function addBasicDetails(): PropertySpaceDataGenerator
    {
        $data = [
            'id' => $this->space->id,
            'accountId' => $this->space->accountId,
            'internalName' => $this->space->internalName,
            'displayName' => $this->space->displayName,
            'status' => $this->space->status,
            'longDescription' => $this->space->longDescription,
            'noOfUnits' => $this->space->noOfUnits,
            'inventorySettings' => [
                'accuracy' => $this->space->inventorySettings->accuracy,
                'hourlySlots' => $this->space->inventorySettings->hourlySlots,
            ]
        ];

        if ($this->space->view) {
            $data['view'] = [
                'code' => $this->space->view->code,
                'name' => $this->space->view->name,
                'description' => $this->space->view->description,
            ];
        }

        if ($this->space->size) {
            $data['size'] = [
                'areaSqft' => $this->space->size->areaSqft
            ];
        }

        return $this->appendData($data);
    }

    /**
     * @return PropertySpaceDataGenerator
     */
    public function addOccupancy(): PropertySpaceDataGenerator
    {
        $occupancy = $this->space->occupancy;

        return $this->appendData([
            'occupancy' => [
                'minCount' => $occupancy->minCount,
                'baseCount' => $occupancy->baseCount,
                'maxCount' => $occupancy->maxCount,
                'minAdultCount' => $occupancy->minAdultCount,
                'maxAdultCount' => $occupancy->maxAdultCount,
                'minChildCount' => $occupancy->minChildCount,
                'maxChildCount' => $occupancy->maxChildCount,
                'baseRateCounts' => $occupancy->getInspector()->baseRateCounts(),
                'baseRateCountDetails' => $occupancy->getInspector()->baseRateCountDetails(),
                'extraAdultRateCounts' => $occupancy->getInspector()->extraRateCounts(AgeCode::ADULT),
                'extraAdultRateCountDetails' => $occupancy->getInspector()->extraRateCountDetails(AgeCode::ADULT),
                'extraChildRateCounts' => $occupancy->getInspector()->extraRateCounts(AgeCode::CHILD),
                'extraChildRateCountDetails' => $occupancy->getInspector()->extraRateCountDetails(AgeCode::CHILD),
                'extraRateCounts' => array_merge($occupancy->getInspector()->extraRateCounts(AgeCode::ADULT), $occupancy->extraRateCounts(AgeCode::CHILD)),
                'extraRateCountDetails' => array_merge($occupancy->getInspector()->extraRateCountDetails(AgeCode::ADULT), $occupancy->extraRateCountDetails(AgeCode::CHILD)),
                'maxGuestString' => $occupancy->getInspector()->maxGuestsString()
            ],
        ]);
    }
}
