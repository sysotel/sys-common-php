<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Carbon\Carbon;
use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\PromotionStatus;
use SYSOTEL\APP\Common\Enums\CMS\PromotionType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAutoIncrementId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\Document(
 *     collection="promotions",
 * )
 * @ODM\HasLifecycleCallbacks
 */
class Promotion extends BaseDocument
{
    use CanResolveIntegerID, HasAutoIncrementId, HasTimestamps, HasPropertyId;
    use HasDefaultAttributes;

    /**
     * @var ?string
     * @ODM\Field (type="string")
     */
    protected $internalName;

    /**
     * @var ?string
     * @ODM\Field (type="string")
     */
    protected $displayName;

    /**
     * @var ?PromotionType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PromotionType::class)
     */
    protected $type;

    /**
     * @var ?PromotionStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PromotionStatus::class)
     */
    protected $status;

    /**
     * @var ?BasicPromotionDetails
     * @ODM\EmbedOne(
     *  discriminatorMap={
     *  "BASIC"=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\BasicPromotionDetails::class
     *     },
     *  discriminatorField="type"
     * )
     */

    protected $details;


    /**
     * @return string|null
     */
    public function getInternalName(): ?string
    {
        return $this->internalName;
    }

    /**
     * @param string|null $internalName
     * @return Promotion
     */
    public function setInternalName(?string $internalName): Promotion
    {
        $this->internalName = $internalName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param string|null $displayName
     * @return Promotion
     */
    public function setDisplayName(?string $displayName): Promotion
    {
        $this->displayName = $displayName;
        return $this;
    }


    /**
     * @return PromotionType|null
     */
    public function getType(): ?PromotionType
    {
        return $this->type;
    }

    /**
     * @param PromotionType|null $type
     * @return Promotion
     */
    public function setType(?PromotionType $type): Promotion
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return PromotionStatus|null
     */
    public function getStatus(): ?PromotionStatus
    {
        return $this->status;
    }

    /**
     * @param PromotionStatus|null $status
     * @return Promotion
     */
    public function setStatus(?PromotionStatus $status): Promotion
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return BasicPromotionDetails|null
     */
    public function getDetails(): ?BasicPromotionDetails
    {
        return $this->details;
    }

    /**
     * @param BasicPromotionDetails|null $details
     * @return Promotion
     */
    public function setDetails(?BasicPromotionDetails $details): Promotion
    {
        $this->details = $details;
        return $this;
    }





}
