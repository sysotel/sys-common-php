<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 */
class ProductRateThresholds extends EmbeddedDocument
{
    /**
     * @var float
     * @ODM\Field(type="float")
     */
    protected $lowest;

    /**
     * @var float
     * @ODM\Field(type="float")
     */
    protected $highest;

    /**
     * @return float
     */
    public function getLowest(): float
    {
        return $this->lowest;
    }

    /**
     * @param float $lowest
     * @return ProductRateThresholds
     */
    public function setLowest(float $lowest): ProductRateThresholds
    {
        $this->lowest = $lowest;
        return $this;
    }

    /**
     * @return float
     */
    public function getHighest(): float
    {
        return $this->highest;
    }

    /**
     * @param float $highest
     * @return ProductRateThresholds
     */
    public function setHighest(float $highest): ProductRateThresholds
    {
        $this->highest = $highest;
        return $this;
    }
}
