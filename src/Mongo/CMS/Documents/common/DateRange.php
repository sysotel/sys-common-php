<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Carbon\Carbon;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class DateRange extends EmbeddedDocument
{
    /**
     * @var ?Carbon
     * @ODM\field(type="carbon")
     */
    protected $start;

    /**
     * @var ?Carbon
     * @ODM\field(type="carbon")
     */
    protected $end;

    /**
     * @return Carbon|null
     */
    public function getStart(): ?Carbon
    {
        return $this->start;
    }

    /**
     * @param Carbon|null $start
     * @return DateRange
     */
    public function setStart(?Carbon $start): DateRange
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getEnd(): ?Carbon
    {
        return $this->end;
    }

    /**
     * @param Carbon|null $end
     * @return DateRange
     */
    public function setEnd(?Carbon $end): DateRange
    {
        $this->end = $end;
        return $this;
    }
}
