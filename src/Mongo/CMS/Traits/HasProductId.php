<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use SYSOTEL\APP\Common\Enums\CMS\Account;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait HasProductId
{
    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    public $productId;

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int|null $productId
     * @return static
     */
    public function setProductId(?int $productId): static
    {
        $this->productId = $productId;
        return $this;
    }
}
