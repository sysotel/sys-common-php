<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class GeoPoint extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $type = 'Point';

    /**
     * @var float[]
     * @ODM\Field(type="collection")
     */
    protected $coordinates = [];

    /**
     * @param float $longitude
     * @param float $latitude
     * @return self
     */
    public static function createFromCoordinates(float $longitude, float $latitude): self
    {
        $instance = new self;
        $instance->coordinates = [$longitude, $latitude];
        return $instance;
    }

    /**
     * Returns google map url for the address
     *
     * @return string
     */
    public function googleMapURL(): string
    {
        return "https://maps.google.com/maps?q={$this->getLatitude()},{$this->getLongitude()}";
    }

    public function getLatitude(): ?float
    {
        return $this->coordinates[1] ?? null;
    }

    public function getLongitude(): ?float
    {
        return $this->coordinates[0] ?? null;
    }

    /**
     * @return float[]
     */
    public function getCoordinates(): array
    {
        return $this->coordinates;
    }

    /**
     * @param float[] $coordinates
     * @return GeoPoint
     */
    public function setCoordinates(array $coordinates): GeoPoint
    {
        $this->coordinates = $coordinates;
        return $this;
    }
}
