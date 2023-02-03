<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Property;

trait HasLabelProperties
{
    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $propertyLabel;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $spaceLabel;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $productLabel;

    /**
     * @return string|null
     */
    public function getPropertyLabel(): ?string
    {
        return $this->propertyLabel;
    }

    /**
     * @param string|null $propertyLabel
     * @return static
     */
    public function setPropertyLabel(?string $propertyLabel): static
    {
        $this->propertyLabel = $propertyLabel;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSpaceLabel(): ?string
    {
        return $this->spaceLabel;
    }

    /**
     * @param string|null $spaceLabel
     * @return static
     */
    public function setSpaceLabel(?string $spaceLabel): static
    {
        $this->spaceLabel = $spaceLabel;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductLabel(): ?string
    {
        return $this->productLabel;
    }

    /**
     * @param string|null $productLabel
     * @return static
     */
    public function setProductLabel(?string $productLabel): static
    {
        $this->productLabel = $productLabel;
        return $this;
    }


}
