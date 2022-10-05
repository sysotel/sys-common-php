<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait HasSpaceId
{
    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $spaceId;

    /**
     * @return int|null
     */
    public function getSpaceId(): ?int
    {
        return $this->spaceId;
    }

    /**
     * @param int|null $spaceId
     * @return static
     */
    public function setSpaceId(?int $spaceId): static
    {
        $this->spaceId = $spaceId;
        return $this;
    }
}
