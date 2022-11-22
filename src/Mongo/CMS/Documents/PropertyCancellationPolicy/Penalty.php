<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyCancellationPolicy;

use Carbon\Carbon;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
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

    /**
     * @return PenaltyType
     */
    public function getType(): PenaltyType
    {
        return $this->type;
    }

    /**
     * @param PenaltyType $type
     */
    public function setType(PenaltyType $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @param int|null $value
     */
    public function setValue(?int $value): void
    {
        $this->value = $value;
    }


}
