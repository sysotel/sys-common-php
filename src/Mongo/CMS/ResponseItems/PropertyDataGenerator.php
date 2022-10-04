<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\ResponseItems;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;

class PropertyDataGenerator
{
    use Helpers;

    /**
     * @var Property
     */
    protected Property $property;

    /**
     * @param Property $property
     */
    protected function __construct(Property $property)
    {
        $this->property = $property;
    }

    /**
     * @return PropertyDataGenerator
     */
    public function addBasicDetails(): PropertyDataGenerator
    {
        return $this->appendData([
            'id' => $this->property->id,
            'displayName' => $this->property->displayName,
            'starRating' => $this->property->starRating->value,
            'type' => $this->property->type,
            'baseCurrency' => $this->property->baseCurrency->value,
            'allowedBookingTypes' => $this->property->allowedBookingTypes,
            'buildYear' => $this->property->buildYear,
            'longDescription' => $this->property->longDescription,
            'propertyLabel' => $this->property->propertyLabel,
            'spaceLabel' => $this->property->spaceLabel,
            'productLabel' => $this->property->productLabel,
        ]);
    }

    /**
     * @param bool $addCoordinates
     * @param bool $addAddressStrings
     * @return PropertyDataGenerator
     */
    public function addAddress(bool $addCoordinates = true, bool $addAddressStrings = true): PropertyDataGenerator
    {
        $data['address'] = [
            'line1' => $this->property->address->line1,
            'area' => $this->property->address->area->name,
            'city' => $this->property->address->city->name,
            'state' => $this->property->address->state->name,
            'country' => $this->property->address->country->name,
        ];

        if ($addCoordinates && $this->property->address->geoPoint) {
            $data['address']['coordinates'] = [
                'longitude' => $this->property->address->geoPoint->getLongitude(),
                'latitude' => $this->property->address->geoPoint->getLatitude(),
            ];
        }

        if($addAddressStrings) {
            $data['address'] = array_merge($data['address'], [
                'cityStateString' => $this->property->address->cityStateString(),
                'cityStateCountryString' => $this->property->address->cityStateCountryString(),
                'areaCityString' => $this->property->address->areaCityString(),
                'fullAddress' => $this->property->address->fullAddress,
            ]);
        }

        return $this->appendData($data);
    }
}
