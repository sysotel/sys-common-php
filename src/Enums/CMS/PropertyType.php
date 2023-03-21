<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\EnumLabelExtension;

enum PropertyType: string
{
    use EnumLabelExtension;

    case HOTEL = 'HOTEL';
    case RESORT = 'RESORT';
    case HOMESTAY = 'HOMESTAY';
    case VILLA = 'VILLA';
    case APARTMENT = 'APARTMENT';
    case GUEST_HOUSE = 'GUEST_HOUSE';
    case LODGE = 'LODGE';
    case HOUSEBOAT = 'HOUSEBOAT';
    case FARM_HOUSE = 'FARM_HOUSE';
    case PALACE = 'PALACE';
    case MOTEL = 'MOTEL';
    case DHARAMSHALA = 'DHARAMSHALA';
    case COTTAGE = 'COTTAGE';
    case CAMP = 'CAMP';
    case POD = 'POD';
    case OTHER = 'OTHER';

    public function propertyLabel(): string
    {
        return 'Hotel';
    }

    public function spaceLabel(): string
    {
        return 'Room';
    }

    public function userFriendlyName(): string
    {
        return match ($this) {
            self::HOTEL => 'Hotel',
            self::RESORT => 'Resort',
            self::HOMESTAY => 'Homestay',
            self::VILLA => 'Villa',
            self::APARTMENT => 'Apartmet',
            self::GUEST_HOUSE => 'Guest House',
            self::LODGE => 'Lodge',
            self::HOUSEBOAT => 'House boat',
            self::FARM_HOUSE => 'Farm House',
            self::PALACE => 'Palace',
            self::MOTEL => 'Motel',
            self::DHARAMSHALA => 'Dharamshala',
            self::COTTAGE => 'Cottage',
            self::CAMP => 'Camp',
            self::POD => 'Pod',
            self::OTHER => 'Other'
        };
    }
}
