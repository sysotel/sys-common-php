<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

enum SpaceCategory: string
{
    case APARTMENT = 'APARTMENT';
    case QUADRUPLE = 'QUADRUPLE';
    case SUITE = 'SUITE';
    case TRIPLE = 'TRIPLE';
    case TWIN = 'TWIN';
    case DOUBLE = 'DOUBLE';
    case SINGLE = 'SINGLE';
    case STUDIO = 'STUDIO';
    case FAMILY = 'FAMILY';
    case DORMITORY = 'DORMITORY';
    case BED_DORMITORY = 'BED_DORMITORY';
    case BUNGALOW = 'BUNGALOW';
    case CHALET = 'CHALET';
    case HOLIDAY_HOME = 'HOLIDAY_HOME';
    case VILLA = 'VILLA';
    case MOBILE_HOME = 'MOBILE_HOME';
    case TENT = 'TENT';
    case POWERED_SITE = 'POWERED_SITE';
    case KING = 'KING';
    case QUEEN = 'QUEEN';

    public function userFriendlyName(): string
    {
        return match ($this) {
            self::APARTMENT => 'Apartment',
            self::QUADRUPLE => 'QUADRUPLE',
            self::SUITE => 'Homestay',
            self::TRIPLE => 'Villa',
            self::TWIN => 'Apartmet',
            self::DOUBLE => 'Guest House',
            self::SINGLE => 'Lodge',
            self::STUDIO => 'House boat',
            self::FAMILY => 'Farm House',
            self::DORMITORY => 'Palace',
            self::BED_DORMITORY => 'Motel',
            self::BUNGALOW => 'Dharamshala',
            self::CHALET => 'Cottage',
            self::HOLIDAY_HOME => 'Camp',
            self::VILLA => 'Pod',
            self::MOBILE_HOME => 'Other',
            self::TENT => 'Tent',
            self::POWERED_SITE => 'Powered/Unpowered Site',
            self::KING => 'King',
            self::QUEEN => 'Queen'
        };
    }
}
