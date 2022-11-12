<?php

namespace SYSOTEL\APP\Common\Enums\CMS;

use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;

enum NearbyPlaceCategory: string
{
    use BackedEnumHelpers;

    case AIRPORT = 'AIRPORT';
    case RAILWAY_STATION = 'RAILWAY_STATION';
    case BUS_STATION = 'BUS_STATION';
    CASE OTHER = 'OTHER';

    public function userFriendlyValue(): string
    {
        $data = $this->value;
        return readableConstant($data);
    }

    public static function nearByPlaces(): array
    {
        return [
            self::AIRPORT,
            self::RAILWAY_STATION,
            self::BUS_STATION,
            self::OTHER,
        ];
    }
}
