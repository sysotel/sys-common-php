<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace\PropertySpace;

trait HasAutoIncrementId
{
    /**
     * @var ?int
     * @ODM\Id(strategy="CUSTOM", type="int", options={"class"=SYSOTEL\APP\Common\Mongo\CMS\StorageStrategies\AutoIncrementID::class }))
     */
    protected $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return static
     */
    public function setId(?int $id): static
    {
        $this->id = $id;
        return $this;
    }
}
