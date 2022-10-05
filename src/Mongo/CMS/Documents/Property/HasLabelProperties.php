<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Property;

trait HasLabelProperties
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $propertyLabel;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $spaceLabel;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $productLabel;

    /**
     * @return string
     */
    public function getPropertyLabel(): string
    {
        return $this->propertyLabel;
    }

    /**
     * @param string $propertyLabel
     * @return HasLabelProperties
     */
    public function setPropertyLabel(string $propertyLabel): HasLabelProperties
    {
        $this->propertyLabel = $propertyLabel;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpaceLabel(): string
    {
        return $this->spaceLabel;
    }

    /**
     * @param string $spaceLabel
     * @return HasLabelProperties
     */
    public function setSpaceLabel(string $spaceLabel): HasLabelProperties
    {
        $this->spaceLabel = $spaceLabel;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductLabel(): string
    {
        return $this->productLabel;
    }

    /**
     * @param string $productLabel
     * @return HasLabelProperties
     */
    public function setProductLabel(string $productLabel): HasLabelProperties
    {
        $this->productLabel = $productLabel;
        return $this;
    }
}
