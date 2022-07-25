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

    public function propertyLabel(): string
    {
        return 'hotel';
    }

    public function spaceLabel(): string
    {
        return 'room';
    }
}
