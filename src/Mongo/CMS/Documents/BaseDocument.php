<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Property;

use Delta4op\Mongodb\Documents\Document;

abstract class BaseDocument extends Document
{
    /**
     * Connection name
     *
     * @var null|string
     */
    const CONNECTION = 'cms';
}
