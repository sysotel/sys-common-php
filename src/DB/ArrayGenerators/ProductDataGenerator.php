<?php

namespace SYSOTEL\APP\Common\DB\ArrayGenerators;

use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\Services\Eloquent\Support\ProductInclusionsGetter;

class ProductDataGenerator extends ArrayDataGenerator
{

    protected PropertyProduct $product;

    protected function __construct(PropertyProduct $product)
    {
        $this->product = $product;
    }

    public static function create(PropertyProduct $product): static
    {
        return new static($product);
    }

    public function addBasicDetails($spaceLabel = null): static
    {
        $data = [
            'id' => $this->product->id,
            'accountId' => $this->product->accountId,
            'propertyId' => $this->product->propertyId,
            'spaceId' => $this->product->spaceId,
            'displayName' => $this->product->displayName,
            'internalName' => $this->product->internalName,
            'longDescription' => $this->product->longDescription,
            'mealPlanCode' => $this->product->mealPlanCode,
            'status' => $this->product->status?->value,
            'inclusions' => $this->product->inclusions,
            'inclusionsExtended' => ProductInclusionsGetter::get($this->product),
        ];

        if(!count($data['inclusionsExtended']) && $spaceLabel) {
            $data['inclusionsExtended'] = ["$spaceLabel Only"];
        }

        return $this->appendData($data);
    }
}
