<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Rules\PropertyPolicy;

trait HasIsAllowedFlag
{
    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $isAllowed;
}
