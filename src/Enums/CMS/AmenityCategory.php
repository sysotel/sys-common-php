<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use Exception;
use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum AmenityCategory: string
{
    use BackedEnumHelpers;

    // amenity categories
    case BASIC_FACILITIES = 'BASIC_FACILITIES';
    case GENERAL_SERVICES = 'GENERAL_SERVICES';
    case OUTDOOR_ACTIVITIES_AND_SPORTS = 'OUTDOOR_ACTIVITIES_AND_SPORTS';
    case COMMON_AREA = 'COMMON_AREA';
    case FOOD_DRINKS = 'FOOD_DRINKS';
    case HEALTH_WELLNESS = 'HEALTH_WELLNESS';
    case BUSINESS = 'BUSINESS';
    case BEAUTY_AND_SPA = 'BEAUTY_AND_SPA';
    case SECURITY = 'SECURITY';
    case TRANSFER = 'TRANSFER';
    case SHOPPING = 'SHOPPING';
    case ENTERTAINMENT = 'ENTERTAINMENT';
    case MEDIA_TECHNOLOGY = 'MEDIA_TECHNOLOGY';
    case PAYMENT_SERVICES = 'PAYMENT_SERVICES';
    case INDOOR_ACTIVITIES_AND_SPORTS = 'INDOOR_ACTIVITIES_AND_SPORTS';
    case FAMILY_AND_KIDS = 'FAMILY_AND_KIDS';
    case SAFETY_HYGIENE = 'SAFETY_HYGIENE';
    case PET_ESSENTIALS = 'PET_ESSENTIALS';

    // space categories
    case POPULAR_WITH_GUESTS = 'POPULAR_WITH_GUESTS';
    case BATHROOM = 'BATHROOM';
    case SPACE_FEATURES = 'SPACE_FEATURES';
    case MEDIA_ENTERTAINMENT = 'MEDIA_ENTERTAINMENT';
    case FOOD_AND_DRINKS = 'FOOD_AND_DRINKS';
    case KITCHEN_AND_APPLIANCES = 'KITCHEN_AND_APPLIANCES';
    case BEDS_AND_BLANKET = 'BEDS_AND_BLANKET';
    case SAFETY_AND_SECURITY = 'SAFETY_AND_SECURITY';
    case CHILDCARE = 'CHILDCARE';
    case OTHER = 'OTHER';

    public function userFriendlyValue(): string
    {
        $data = $this->value;
        return readableConstant($data);
    }

    public function propertyCategories(): array
    {
        return [
            self::BASIC_FACILITIES,
            self::GENERAL_SERVICES,
            self::OUTDOOR_ACTIVITIES_AND_SPORTS,
            self::COMMON_AREA,
            self::FOOD_DRINKS,
            self::BEAUTY_AND_SPA,
            self::BUSINESS,
            self::HEALTH_WELLNESS,
            self::SECURITY,
            self::TRANSFER,
            self::SHOPPING,
            self::ENTERTAINMENT,
            self::MEDIA_TECHNOLOGY,
            self::PAYMENT_SERVICES,
            self::INDOOR_ACTIVITIES_AND_SPORTS,
            self::FAMILY_AND_KIDS,
            self::SAFETY_HYGIENE,
            self::PET_ESSENTIALS
        ];


    }

    public function spaceCategories(): array
    {
        return [
            self::POPULAR_WITH_GUESTS,
            self::BATHROOM,
            self::SPACE_FEATURES,
            self::MEDIA_ENTERTAINMENT,
            self::FOOD_AND_DRINKS,
            self::KITCHEN_AND_APPLIANCES,
            self::BEDS_AND_BLANKET,
            self::SAFETY_AND_SECURITY,
            self::CHILDCARE,
            self::OTHER,
        ];
    }
}
