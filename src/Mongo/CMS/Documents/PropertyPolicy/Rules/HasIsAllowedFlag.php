<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules;;

trait HasIsAllowedFlag
{
    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    protected $isAllowed;

    /**
     * @return bool
     */
    public function getIsAllowed(): ?bool
    {
        return $this->isAllowed;
    }

    /**
     * @param bool $isAllowed
     * @return static
     */
    public function setIsAllowed(bool $isAllowed): static
    {
        $this->isAllowed = $isAllowed;
        return $this;
    }
}
