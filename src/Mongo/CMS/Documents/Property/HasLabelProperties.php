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
     * @return self
     */
    public function setPropertyLabel(?string $propertyLabel): self
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
     * @return self
     */
    public function setSpaceLabel(?string $spaceLabel): self
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
     * @return self
     */
    public function setProductLabel(?string $productLabel): self
    {
        $this->productLabel = $productLabel;
        return $this;
    }
}
