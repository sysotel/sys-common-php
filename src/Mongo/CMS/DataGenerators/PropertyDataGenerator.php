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
            'slug' => $this->property->getSlug(),
            'accountSlug' => $this->property->getAccountSlug(),
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

    public function addAddress(bool $addCoordinates = true, bool $addAddressStrings = true, bool $addGoogleMapDetails = true): PropertyDataGenerator
    {
        $property = $this->property;

        if(!$this->property->getAddress()) return $this;
        $data['address'] = [
            'line1' => $property->getAddress()->getLine1(),
            'postalCode' => $property->getAddress()->getPostalCode(),
            'area' => $property->getAddress()->getArea()->getName(),
            'areaId' => $property->getAddress()->getArea()->getId(),
            'city' => $property->getAddress()->getCity()->getName(),
            'cityId' => $property->getAddress()->getCity()->getId(),
            'state' => $property->getAddress()->getState()->getName(),
            'stateId' => $property->getAddress()->getState()->getId(),
            'country' => $property->getAddress()->getCountry()->getName(),
            'countryId' => $property->getAddress()->getCountry()->getId(),
        ];

        if ($addCoordinates && $property->getAddress()->getGeoPoint()) {
            $lat = $property->getAddress()->getGeoPoint()->getLatitude();
            $lng = $property->getAddress()->getGeoPoint()->getLongitude();

            if(is_numeric($lat) && is_numeric($lng)) {
                $data['address']['googleMapUrl'] = googleMapUrl($lat, $lng);
                $data['address']['coordinates'] = [
                    'latitude' => $property->getAddress()->getGeoPoint()->getLatitude(),
                    'longitude' => $property->getAddress()->getGeoPoint()->getLongitude(),
                ];
            }
        }

        if($googleMapDetails = $property->getAddress()?->getGoogleMapDetails()) {
            $data['address']['googleMapDetails'] = [
                'placeId' => $googleMapDetails->getPlaceId(),
                'phone' => $googleMapDetails->getPhone(),
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
