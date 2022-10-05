<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct;

use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\MealPlanCode;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyProductRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertySpaceRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAutoIncrementId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasPropertyId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasSpaceId;

/**
 * @ODM\Document(
 *     collection="propertyProducts",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyProductRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class PropertyProduct extends BaseDocument
{
    use HasAutoIncrementId, HasAccountId, HasPropertyId, HasSpaceId, HasTimestamps;
    use CanResolveIntegerID, HasDefaultAttributes;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $displayName;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $internalName;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    protected $shortDescription;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    protected $longDescription;

    /**
     * @var ?PaymentMode
     * @ODM\EmbedOne(targetDocument=PaymentMode::class)
     */
    protected $paymentMode;

    /**
     * @var MealPlanCode
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\MealPlanCode::class)
     */
    protected $mealPlanCode;

    /**
     * @var string[]
     * @ODM\Field(type="collection")
     */
    protected $inclusions = [];

    /**
     * @var PropertyProductStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus::class)
     */
    protected $status;

    protected $defaults = [
        'status' => PropertyProductStatus::ACTIVE,
    ];

    /**
     * @return $this
     */
    public function autofillInclusions(): static
    {
        if(!$this->inclusions) {
            $this->inclusions = $this->mealPlanCode->inclusions();
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     * @return PropertyProduct
     */
    public function setDisplayName(string $displayName): PropertyProduct
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalName(): string
    {
        return $this->internalName;
    }

    /**
     * @param string $internalName
     * @return PropertyProduct
     */
    public function setInternalName(string $internalName): PropertyProduct
    {
        $this->internalName = $internalName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param string|null $shortDescription
     * @return PropertyProduct
     */
    public function setShortDescription(?string $shortDescription): PropertyProduct
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    /**
     * @param string|null $longDescription
     * @return PropertyProduct
     */
    public function setLongDescription(?string $longDescription): PropertyProduct
    {
        $this->longDescription = $longDescription;
        return $this;
    }

    /**
     * @return PaymentMode|null
     */
    public function getPaymentMode(): ?PaymentMode
    {
        return $this->paymentMode;
    }

    /**
     * @param PaymentMode|null $paymentMode
     * @return PropertyProduct
     */
    public function setPaymentMode(?PaymentMode $paymentMode): PropertyProduct
    {
        $this->paymentMode = $paymentMode;
        return $this;
    }

    /**
     * @return MealPlanCode
     */
    public function getMealPlanCode(): MealPlanCode
    {
        return $this->mealPlanCode;
    }

    /**
     * @param MealPlanCode $mealPlanCode
     * @return PropertyProduct
     */
    public function setMealPlanCode(MealPlanCode $mealPlanCode): PropertyProduct
    {
        $this->mealPlanCode = $mealPlanCode;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getInclusions(): array
    {
        return $this->inclusions;
    }

    /**
     * @param string[] $inclusions
     * @return PropertyProduct
     */
    public function setInclusions(array $inclusions): PropertyProduct
    {
        $this->inclusions = $inclusions;
        return $this;
    }

    /**
     * @return PropertyProductStatus
     */
    public function getStatus(): PropertyProductStatus
    {
        return $this->status;
    }

    /**
     * @param PropertyProductStatus $status
     * @return PropertyProduct
     */
    public function setStatus(PropertyProductStatus $status): PropertyProduct
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return PropertyProductRepository
     */
    public static function repository(): PropertyProductRepository
    {
        return parent::repository();
    }
}
