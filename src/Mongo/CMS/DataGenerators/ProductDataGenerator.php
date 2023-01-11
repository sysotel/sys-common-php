<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct\PropertyProduct;

class ProductDataGenerator
{
    use Helpers;

    protected PropertyProduct $product;

    protected function __construct(PropertyProduct $product)
    {
        $this->product = $product;
    }

    public function addBasicDetails($spaceLabel = 'Room'): static
    {
        $data = [
            'id' => $this->product->getId(),
            'accountId' => $this->product->getAccountId(),
            'propertyId' => $this->product->getPropertyId(),
            'spaceId' => $this->product->getSpaceId(),
            'displayName' => $this->product->getDisplayName(),
            'internalName' => $this->product->getInternalName(),
            'longDescription' => $this->product->getLongDescription(),
            'mealPlanCode' => $this->product->getMealPlanCode(),
            'status' => $this->product->getStatus()?->value,
            'inclusions' => $this->product->getInclusions()
        ];

        if(!count($data['inclusions'])) {
            $data['inclusions'] = ["$spaceLabel Only"];
        }

        return $this->appendData($data);
    }
}
