<?php

namespace SYSOTEL\APP\Common\Services\Eloquent\CancellationServices;

use SYSOTEL\APP\Common\DB\Models\PropertyCancellationPolicy\embedded\Penalty;
use SYSOTEL\APP\Common\Enums\CMS\PenaltyType;

class CancellationHelpers
{
    /**
     * Returns day, hour, hours or days label based on value
     *
     * @param int $hours
     * @return string
     */
    public static function getDayOrHourLabel(int $hours): string
    {
        $days = $hours / 24;
        return is_int($days)
            ? self::getDayLabel($days)
            : self::getHourLabel($hours);
    }

    /**
     * Returns day or days label based on value
     *
     * @param int $days
     * @return string
     */
    public static function getDayLabel(int $days): string
    {
        $postfix = $days > 1 ? 'days' : 'day';

        return "$days $postfix";
    }

    /**
     * Returns Hour or Hours label based on value
     *
     * @param int $hours
     * @return string
     */
    public static function getHourLabel(int $hours): string
    {
        $postfix = $hours > 1 ? 'hours' : 'hour';

        return "$hours $postfix";
    }

    /**
     * @param Penalty $penalty
     * @return string
     */
    public static function getPenaltyLabel(Penalty $penalty): string
    {
        $value = $penalty->value;

        return ($penalty->type == PenaltyType::PERC)
            ? "$value%"
            : "$value INR";
    }
}
