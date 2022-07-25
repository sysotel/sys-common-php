<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Property;

use Illuminate\Support\Str;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\Address;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\RawAddress;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyRepository;

trait SlugGenerators
{
    /**
     * @return string
     */
    protected function generateSlug(): string
    {
        /** @var Property $result */
        /** @var PropertyRepository $repository */
        $repository = Property::repository();
        if (!$this->displayName) {
            abort(500, 'Cannot generate slug without displayName value');
        }

        $nameSlug = Str::slug($this->displayName);
        $result = $repository->findBySlug($nameSlug);
        if (!$result || $result->id === $this->id) {
            return $nameSlug;
        }

        /** @var Address|RawAddress|null $address */
        $address = $this->rawAddress ?? $this->address ?? null;

        if($address && $address->getCityName()) {

            $citySlug = Str::slug($address->getCityName());
            $nameCitySlug = "{$nameSlug}-{$citySlug}";
            $result = self::repository()->findBySlug($nameCitySlug);

            if (!$result || $result->id === $this->id) {
                return $nameCitySlug;
            }

            return "{$nameCitySlug}-{$this->id}";
        }

        return "{$nameSlug}-{$this->id}";
    }

    /**
     * @return string
     */
    protected function generateAccountSlug(): string
    {
        /** @var Property $result */
        /** @var PropertyRepository $repository */
        $repository = Property::repository();
        if (!$this->displayName) {
            abort(500, 'Cannot generate slug without displayName value');
        }

        $nameSlug = Str::slug($this->displayName);
        $result = $repository->findByAccountSlug($this->accountId, $nameSlug);
        if (!$result || $result->id === $this->id) {
            return $nameSlug;
        }

        /** @var Address|RawAddress|null $address */
        $address = $this->rawAddress ?? $this->address ?? null;

        if($address && $address->getCityName()) {

            $citySlug = Str::slug($address->getCityName());
            $nameCitySlug = "{$nameSlug}-{$citySlug}";
            $result = $repository->findByAccountSlug($this->accountId, $nameCitySlug);

            if (!$result || $result->id === $this->id) {
                return $nameCitySlug;
            }

            return "{$nameCitySlug}-{$this->id}";
        }

        return "{$nameSlug}-{$this->id}";
    }
}
