<?php

namespace SYSOTEL\APP\Common\DB\ArrayGenerators;


use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertyImage\PropertyImage;

class PropertyDataGenerator extends ArrayDataGenerator
{
    private Property $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public static function create(Property $property): static
    {
        return new static($property);
    }

    public function addBasicDetails(): PropertyDataGenerator
    {
        return $this->appendData([
            'id' => $this->property->id,
            'accountId' => $this->property->accountId,
            'slug' => $this->property->slug,
            'accountSlug' => $this->property->accountSlug,
            'displayName' => $this->property->displayName,
            'starRating' => $this->property->starRating?->value,
            'type' => $this->property->type,
            'baseCurrency' => $this->property->baseCurrency?->value,
            'timezone' => $this->property->timezone?->value,
            'allowedBookingTypes' => $this->property->allowedBookingTypes,
            'noOfSpaces' => $this->property->noOfSpaces,
            'noOfFloors' => $this->property->noOfFloors,
            'buildYear' => $this->property->buildYear,
            'longDescription' => $this->property->longDescription,
            'propertyLabel' => $this->property->propertyLabel,
            'spaceLabel' => $this->property->spaceLabel,
            'productLabel' => $this->property->productLabel,
            'createdAt' => $this->property->createdAt,
            'createdAtString' => $this->property?->createdAt?->format('d M, Y H:i'),
        ]);
    }



    public function addCreatorDetails(): PropertyDataGenerator
    {
        return $this->appendData([
            'creator' => [
                'id' => $this->property->creator->id,
                'name' => $this->property->creator->name,
                'type' => $this->property->creator->type,
                'email' => $this->property->creator->email ?? '',
            ]
        ]);
    }

    public function addAddress(bool $addCoordinates = true, bool $addAddressStrings = true, bool $addGoogleMapDetails = true): PropertyDataGenerator
    {
        $property = $this->property;

        if(!$this->property->address) return $this;
        $data['address'] = [
            'line1' => $property->address->line1,
            'postalCode' => $property->address->postalCode,
            'area' => $property->address->area->name,
            'areaId' => $property->address->area->id,
            'city' => $property->address->city->name,
            'cityId' => $property->address->city->id,
            'state' => $property->address->state->name,
            'stateId' => $property->address->state->id,
            'country' => $property->address->country->name,
            'countryId' => $property->address->country->id,
        ];

        if ($addCoordinates && $property->address->geoPoint) {
            $lat = $property->address->geoPoint->coordinates[1] ;
            $lng = $property->address->geoPoint->coordinates[0] ;

            if(is_numeric($lat) && is_numeric($lng)) {
                $data['address']['googleMapUrl'] = googleMapUrl($lat, $lng);
                $data['address']['coordinates'] = [
                    'latitude' => $property->address->geoPoint->coordinates[1] ,
                    'longitude' => $property->address->geoPoint->coordinates[0] ,
                ];
            }
        }

        if($googleMapDetails = $property->address?->googleMapDetails) {
            $data['address']['googleMapDetails'] = [

                'placeId' => $googleMapDetails->placeId,
                'businessName' => $googleMapDetails->name,
                'addr1' => $googleMapDetails->addr1,
                'city' => $googleMapDetails->city,
                'province' => $googleMapDetails->province,
                'country' => $googleMapDetails->country,
                'postalCode' => $googleMapDetails->postalCode,
                'latitude' => $googleMapDetails->latitude,
                'longitude' => $googleMapDetails->longitude,
                'phone' => $googleMapDetails->phone,
            ];
        }

        if($addAddressStrings) {
            $data['address'] = array_merge($data['address'], [
                'cityStateString' => $property->address->cityStateString(),
                'cityStateCountryString' => $property->address->cityStateCountryString(),
                'areaCityString' => $property->address->areaCityString(),
                'fullAddress' => $property->address->fullAddress,
            ]);
        }

        return $this->appendData($data);
    }
}
