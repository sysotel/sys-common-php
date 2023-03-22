<?php

namespace SYSOTEL\APP\Common\DB\Helpers;

use Illuminate\Support\Str;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\Address;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\RawAddress;

class PropertySlugGenerator
{
    private Property $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function generateSlug(): ?string
    {
        $propertyName = $this->property->displayName;

        if (!$propertyName) {
            return null;
        }

        $nameSlug = $this->createPropertyNameSlug();
        $nameSlugResult = Property::repository()->getBySlug($nameSlug);
        if(!$nameSlugResult || $nameSlugResult->id === $this->property->id) {
            return $nameSlug;
        }

        /** @var Address|RawAddress|null $address */
        $citySlug = $this->createCityNameSlug();

        if($citySlug) {
            $nameSlugResult = Property::repository()->getBySlug($nameSlug);
            if(!$nameSlugResult || $nameSlugResult->id === $this->property->id) {
                return $nameSlug;
            }
        }

        return $this->createPropertyNameIdSlug();
    }

    public function generateAccountSlug(): ?string
    {
        $propertyName = $this->property->displayName;

        if (!$propertyName) {
            return null;
        }

        $nameSlug = $this->createPropertyNameSlug();
        $nameSlugResult = Property::repository()->getByAccountSlug($nameSlug);
        if(!$nameSlugResult || $nameSlugResult->id === $this->property->id) {
            return $nameSlug;
        }

        /** @var Address|RawAddress|null $address */
        $citySlug = $this->createCityNameSlug();

        if($citySlug) {
            $nameSlugResult = Property::repository()->getByAccountSlug($nameSlug);
            if(!$nameSlugResult || $nameSlugResult->id === $this->property->id) {
                return $nameSlug;
            }
        }

        return $this->createPropertyNameIdSlug();
    }

    /**
     * @param string $value
     * @return string
     */
    protected function createSlug(string $value): string
    {
        return Str::slug($value);
    }

    /**
     * @return string|null
     */
    protected function createPropertyNameSlug(): ?string
    {
        if (!$name = $this->property->displayName) {
            return null;
        }

        return $this->createSlug($name);
    }

    /**
     * @return string|null
     */
    protected function createCityNameSlug(): ?string
    {
        if(!$name = $this->property->address?->city?->name) {
            return null;
        }

        return $this->createSlug($name);
    }

    /**
     * @return string|null
     */
    protected function createPropertyNameIdSlug(): ?string
    {
        $nameSlug = $this->createPropertyNameSlug();

        if($nameSlug && $id = $this->property->id) {
            return "{$nameSlug}-{$id}";
        }

        return null;
    }
}
