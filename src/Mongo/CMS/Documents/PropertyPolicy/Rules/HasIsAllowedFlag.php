<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity;

trait HasIsAllowedFlag
{
    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $isAllowed;
}
