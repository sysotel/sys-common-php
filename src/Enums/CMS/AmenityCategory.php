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
           'BASIC_FACILITIES',
           'GENERAL_SERVICES',
           'OUTDOOR_ACTIVITIES_AND_SPORTS',
           'COMMON_AREA',
           'FOOD_DRINKS',
           'BEAUTY_AND_SPA',
           'BUSINESS',
           'HEALTH_WELLNESS',
           'SECURITY',
           'TRANSFER',
           'SHOPPING',
           'ENTERTAINMENT',
           'MEDIA_TECHNOLOGY',
           'PAYMENT_SERVICES',
           'INDOOR_ACTIVITIES_AND_SPORTS',
           'FAMILY_AND_KIDS',
           'SAFETY_HYGIENE',
           'PET_ESSENTIALS'
       ];


    }

    public function spaceCategories(): array
    {
        return[
            'POPULAR_WITH_GUESTS',
           'BATHROOM',
           'SPACE_FEATURES',
           'MEDIA_ENTERTAINMENT',
            'FOOD_AND_DRINKS',
            'KITCHEN_AND_APPLIANCES',
            'BEDS_AND_BLANKET',
          'SAFETY_AND_SECURITY',
            'CHILDCARE',
             'OTHER',
        ];
    }
}
