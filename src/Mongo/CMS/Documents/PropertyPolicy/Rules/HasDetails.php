<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules;;

trait HasDetails
{
    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    public $details;

    /**
     * @return string|null
     */
    public function getDetails(): ?string
    {
        return $this->details;
    }

    /**
     * @param string|null $details
     * @return static
     */
    public function setDetails(?string $details): static
    {
        $this->details = $details;
        return $this;
    }
}
