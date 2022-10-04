<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct\PropertyProduct;

class ProductDataGenerator
{
    use Helpers;

    /**
     * @var PropertyProduct
     */
    protected PropertyProduct $product;

    /**
     * @param PropertyProduct $product
     */
    protected function __construct(PropertyProduct $product)
    {
        $this->product = $product;
    }

    /**
     * @return array
     */
    public function addBasicDetails(): array
    {
        return [
            'id' => $this->product->id,
            'accountId' => $this->product->accountId,
            'propertyId' => $this->product->propertyId,
            'spaceId' => $this->product->spaceId,
            'displayName' => $this->product->displayName,
            'internalName' => $this->product->internalName,
            'longDescription' => $this->product->longDescription,
            'mealPlanCode' => $this->product->mealPlanCode,
            'status' => $this->product->status,
            'inclusions' => $this->product->inclusions
        ];
    }
}
