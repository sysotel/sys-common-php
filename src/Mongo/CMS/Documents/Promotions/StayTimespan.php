<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
/**
 * @ODM\EmbeddedDocument
 */
class StayTimespan extends EmbeddedDocument
{

    /**
     * @var ?Carbon
     * @ODM\Field (type="carbon")
     */
    public $start;

    /**
     * @var ?Carbon
     * @ODM\Field (type="carbon")
     */
    public $end;

    /**
     * @return Carbon|null
     */
    public function getStart(): ?Carbon
    {
        return $this->start;
    }

    /**
     * @param Carbon|null $start
     */
    public function setStart(?Carbon $start): void
    {
        $this->start = $start;
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
     */
    public function setEnd(?Carbon $end): void
    {
        $this->end = $end;
    }






}
