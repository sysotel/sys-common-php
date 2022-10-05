<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use SYSOTEL\APP\Common\Enums\CMS\Account;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait HasPropertyId
{
    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    public $propertyId;

    /**
     * @return int|null
     */
    public function getPropertyId(): ?int
    {
        return $this->propertyId;
    }

    /**
     * @param int|null $propertyId
     * @return static
     */
    public function setPropertyId(?int $propertyId): static
    {
        $this->propertyId = $propertyId;
        return $this;
    }
}
