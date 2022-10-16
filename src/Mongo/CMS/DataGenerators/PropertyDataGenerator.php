<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\Property\Property;

class PropertyDataGenerator
{
    use Helpers;

    protected Property $property;

    protected function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function addBasicDetails(): PropertyDataGenerator
    {
        return $this->appendData([
            'id' => $this->property->getId(),
            'accountId' => $this->property->getAccountId(),
            'displayName' => $this->property->getDisplayName(),
            'starRating' => $this->property->getStarRating()->value,
            'type' => $this->property->getType(),
            'baseCurrency' => $this->property->getBaseCurrency()?->value,
            'timezone' => $this->property->getTimezone()?->value,
            'allowedBookingTypes' => $this->property->getAllowedBookingTypes(),
            'noOfSpaces' => $this->property->getNoOfSpaces(),
            'noOfFloors' => $this->property->getNoOfFloors(),
            'buildYear' => $this->property->getBuildYear(),
            'longDescription' => $this->property->getLongDescription(),
            'propertyLabel' => $this->property->getPropertyLabel(),
            'spaceLabel' => $this->property->getSpaceLabel(),
            'productLabel' => $this->property->getProductLabel(),
            'createdAt' => $this->property->getCreatedAt(),
            'createdAtString' => $this->property?->getCreatedAt()?->format('d M, Y H:i'),
        ]);
    }

    public function addDescription(): PropertyDataGenerator
    {
        return $this->appendData([
            'longDescription' => $this->property->getLongDescription(),
        ]);
    }

    public function addCreatorDetails(): PropertyDataGenerator
    {
        return $this->appendData([
            'creator' => [
                'id' => $this->property->getCreator()->getId(),
                'name' => $this->property->getCreator()->getName(),
                'type' => $this->property->getCreator()->getType(),
                'email' => $this->property->getCreator()->getEmail() ?? '',
            ]
        ]);
    }

    public function addAddress(bool $addCoordinates = true, bool $addAddressStrings = true): PropertyDataGenerator
    {
        $property = $this->property;

        if(!$this->property->getAddress()) return $this;
        $data['address'] = [
            'line1' => $property->getAddress()->getLine1(),
            'area' => $property->getAddress()->getArea()->getName(),
            'city' => $property->getAddress()->getCity()->getName(),
            'state' => $property->getAddress()->getState()->getName(),
            'country' => $property->getAddress()->getCountry()->getName(),
        ];

        if ($addCoordinates && $property->getAddress()->getGeoPoint()) {
            $data['address']['coordinates'] = [
                'longitude' => $property->getAddress()->getGeoPoint()->getLongitude(),
                'latitude' => $property->getAddress()->getGeoPoint()->getLatitude(),
            ];
        }

        if($addAddressStrings) {
            $data['address'] = array_merge($data['address'], [
                'cityStateString' => $property->getAddress()->cityStateString(),
                'cityStateCountryString' => $property->getAddress()->cityStateCountryString(),
                'areaCityString' => $property->getAddress()->areaCityString(),
                'fullAddress' => $property->getAddress()->getFullAddress(),
            ]);
        }

        return $this->appendData($data);
    }
}
