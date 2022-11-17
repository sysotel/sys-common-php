<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\CancellationPolicy;

use Carbon\Carbon;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\PenaltyType;


/**
 * @ODM\EmbeddedDocument
 *
 */
class Penalty extends EmbeddedDocument
{

    /**
     * @var PenaltyType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PenaltyType::class)
     */
    protected $type;

    /**
     *  @var ?int
     * @ODM\Field(type="int")
     */
    protected $value;


}
