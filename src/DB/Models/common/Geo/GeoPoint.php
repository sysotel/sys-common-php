<?php

namespace SYSOTEL\APP\Common\DB\Models\common\Geo;

use SYSOTEL\APP\Common\Casts\AsObjectIdString;
use SYSOTEL\APP\Common\DB\Models\BaseModel;

/**
 * @property ?string $type
 * @property array $coordinates
 */
class GeoPoint extends BaseModel
{
    protected $attributes = [
        'type' => 'Point',
        'coordinates' => [],
    ];

    /**
     * @param float $longitude
     * @param float $latitude
     * @return static
     */
    public static function createFromCoordinates(float $longitude, float $latitude): static
    {
        return new self([
            'coordinates' => [$longitude, $latitude]
        ]);
    }

    /**
     * @return string
     */
    public function googleMapURL(): string
    {
        return "https://maps.google.com/maps?q={$this->getLatitude()},{$this->getLongitude()}";
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->coordinates[1] ?? null;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->coordinates[0] ?? null;
    }
}
