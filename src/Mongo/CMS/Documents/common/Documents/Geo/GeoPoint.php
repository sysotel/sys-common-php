<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;

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
    public $type = 'Point';

    /**
     * @var float[]
     * @ODM\Field(type="collection")
     */
    public $coordinates;

    /**
     * @param float $longitude
     * @param float $latitude
     * @return self
     */
    public static function createFromCoordinates(float $longitude, float $latitude): self
    {
        return new self([
            'coordinates' => [
                $longitude, $latitude
            ]
        ]);
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
}
