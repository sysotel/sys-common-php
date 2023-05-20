<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Carbon\Carbon;
use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\DateRestrictionType;
use SYSOTEL\APP\Common\Enums\CMS\PromotionCategory;
use SYSOTEL\APP\Common\Enums\CMS\PromotionStatus;
use SYSOTEL\APP\Common\Enums\CMS\PromotionType;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Counter\Counter;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PromotionRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasObjectIdKey;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;

/**
 * @ODM\Document(
 *     collection="promotions",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PromotionRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 * @ODM\InheritanceType("SINGLE_COLLECTION")
 * @ODM\DiscriminatorField("type")
 * @ODM\DiscriminatorMap({
 *  "BASIC"=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\BasicPromotion::class,
 *  "LAST_MINUTE"=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\LastMinutePromotion\LastMinutePromotion::class,
 *  "EARLY_BIRD"=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\EarlyBirdPromotion\EarlyBirdPromotion::class,
 * })
 */
abstract class Promotion extends BaseDocument
{
    use HasObjectIdKey, CanResolveIntegerID, HasTimestamps, HasPropertyId;
    use HasDefaultAttributes;

    public abstract function getType(): PromotionType;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $promoId;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $code;

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
     * @var ?PromotionStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PromotionStatus::class)
     */
    protected $status;


    /**
     * @var ?bool
     * @ODM\Field(type="bool")
     */
    protected $isExpired;

    /**
     * @var ?PromotionCategory
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PromotionCategory::class)
     */
    protected $category;


    /**
     * @var ?DateRestrictionType
     * @ODM\Field (type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\DateRestrictionType::class)
     */
    protected $dateRestrictionType;

    /**
     * @var ?BookingTimeSpan
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\BookingTimespan::class)
     */
    protected $bookingTimeSpan;


    /**
     * @var ?StayTimespan
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\StayTimespan::class)
     */
    protected $stayTimeSpan;

    /**
     * @var ?ApplicableSpaceDetails
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions\ApplicableSpaceDetails::class)
     */
    protected $applicableSpaceDetails;

    /**
     * @var ?Carbon
     * @ODM\Field(type="carbon")
     */
    protected $expiredAt;

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
     * @return DateRestrictionType|null
     */
    public function getDateRestrictionType(): ?DateRestrictionType
    {
        return $this->dateRestrictionType;
    }

    /**
     * @param DateRestrictionType|null $dateRestrictionType
     */
    public function setDateRestrictionType(?DateRestrictionType $dateRestrictionType): void
    {
        $this->dateRestrictionType = $dateRestrictionType;
    }

    /**
     * @return BookingTimeSpan|null
     */
    public function getBookingTimeSpan(): ?BookingTimeSpan
    {
        return $this->bookingTimeSpan;
    }

    /**
     * @param BookingTimeSpan|null $bookingTimeSpan
     */
    public function setBookingTimeSpan(?BookingTimeSpan $bookingTimeSpan): void
    {
        $this->bookingTimeSpan = $bookingTimeSpan;
    }

    /**
     * @return StayTimespan|null
     */
    public function getStayTimeSpan(): ?StayTimespan
    {
        return $this->stayTimeSpan;
    }

    /**
     * @param StayTimespan|null $stayTimeSpan
     */
    public function setStayTimeSpan(?StayTimespan $stayTimeSpan): void
    {
        $this->stayTimeSpan = $stayTimeSpan;
    }


    public function generateNewPromoId(): static
    {
        $promoId = Counter::getNewValue('promotions');
        $this->promoId = $promoId;
        return $this;

    }

    /**
     * @return ApplicableSpaceDetails|null
     */
    public function getApplicableSpaceDetails(): ?ApplicableSpaceDetails
    {
        return $this->applicableSpaceDetails;
    }

    /**
     * @param ApplicableSpaceDetails|null $applicableSpaceDetails
     */
    public function setApplicableSpaceDetails(?ApplicableSpaceDetails $applicableSpaceDetails): void
    {
        $this->applicableSpaceDetails = $applicableSpaceDetails;
    }


    /**
     * @return int|null
     */
    public function getPromoId(): ?int
    {
        return $this->promoId;
    }

    /**
     * @param int|null $promoId
     */
    public function setPromoId(?int $promoId): void
    {
        $this->promoId = $promoId;
    }

    /**
     * @return $this
     */
    public function markAsExpired(): static
    {
        $this->status = PromotionStatus::EXPIRED;
        $this->expiredAt = now();
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return bool|null
     */
    public function getIsExpired(): ?bool
    {
        return $this->isExpired;
    }

    /**
     * @param bool|null $isExpired
     */
    public function isExpired(?bool $isExpired): void
    {
        $this->isExpired = $isExpired;
    }


    /**
     * @return PromotionCategory|null
     */
    public function getCategory(): ?PromotionCategory
    {
        return $this->category;
    }

    /**
     * @param PromotionCategory|null $category
     */
    public function setCategory(?PromotionCategory $category): void
    {
        $this->category = $category;
    }


    public static function repository(): PromotionRepository
    {
        return parent::repository();
    }

    public function isSpaceApplicable(int $spaceId): bool
    {
        if ($this->getApplicableSpaceDetails()?->getApplicableOnAllSpaces() === true) {
            return true;
        }

        foreach ($this->getApplicableSpaceDetails()?->getApplicableSpaces() as $applicableSpace) {
            if ($applicableSpace->getSpaceId() === $spaceId) {
                return true;
            }
        }

        return false;

    }

    public function isProductApplicable(int $spaceId, int $productId): bool
    {
        if ($this->getApplicableSpaceDetails()?->getApplicableOnAllSpaces() === true) {
            return true;
        }

        foreach ($this->getApplicableSpaceDetails()?->getApplicableSpaces() as $applicableSpace) {
            if ($applicableSpace->getSpaceId() === $spaceId) {
                if ($applicableSpace->getApplicableToAllProducts() === true) {
                    return true;
                }
                foreach ($applicableSpace->getApplicableProducts() as $applicableProduct) {
                    if ($applicableProduct->getProductId() === $productId) {
                        return true;
                    }
                }
            }
        }

        return false;
    }


    public function isAllProductApplicableForSpace(int $spaceId): bool
    {
        if ($this->getApplicableSpaceDetails()?->getApplicableOnAllSpaces() === true) {
            return true;
        }

        foreach ($this->getApplicableSpaceDetails()?->getApplicableSpaces() as $applicableSpace){
            if($applicableSpace->getSpaceId() === $spaceId){
                if($applicableSpace->getApplicableOnAllProducts() === true){
                    return true;
                }
            }
        }

        return false;

    }

}
