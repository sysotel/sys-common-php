<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\ResponseItems;

use SYSOTEL\APP\Common\Enums\CMS\AgeCode;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

class SpaceDataGenerator
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
     * @return SpaceDataGenerator
     */
    public function addBasicDetails(): SpaceDataGenerator
    {
        $data = [
            'id' => $this->space->id,
            'accountId' => $this->space->accountId,
            'internalName' => $this->space->internalName,
            'displayName' => $this->space->displayName,
            'status' => $this->space->status,
            'longDescription' => $this->space->longDescription,
            'noOfUnits' => $this->space->noOfUnits,
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
     * @return SpaceDataGenerator
     */
    public function addOccupancy(): SpaceDataGenerator
    {
        return $this->appendData([
            'occupancy' => [
                'baseCount' => $this->space->occupancy->baseCount,
                'maxCount' => $this->space->occupancy->maxCount,
                'minAdultCount' => $this->space->occupancy->minAdultCount,
                'maxAdultCount' => $this->space->occupancy->maxAdultCount,
                'minChildCount' => $this->space->occupancy->minChildCount,
                'maxChildCount' => $this->space->occupancy->maxChildCount,
                'baseRateCounts' => $this->space->occupancy->baseRateCounts(),
                'extraAdultRateCounts' => $this->space->occupancy->extraRateCounts(AgeCode::ADULT),
                'extraChildRateCounts' => $this->space->occupancy->extraRateCounts(AgeCode::CHILD),
            ],
        ]);
    }
}
