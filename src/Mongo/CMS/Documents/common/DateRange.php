<?php

namespace SYSOTEL\OTA\Common\Mongo\CMS\Documents\common;

use Carbon\Carbon;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class DateRange extends EmbeddedDocument
{
    /**
     * @var Carbon
     * @ODM\field(type="carbon")
     */
    public $start;

    /**
     * @var Carbon
     * @ODM\field(type="carbon")
     */
    public $end;
}
