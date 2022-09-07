<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct;

use \Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\MealPlanCode;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;
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
    public $displayName;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $internalName;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    public $description;

    /**
     * @var PaymentMode
     * @ODM\EmbedOne(targetDocument=PaymentMode::class)
     */
    public $paymentMode;

    /**
     * @var MealPlanCode
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\MealPlanCode::class)
     */
    public $mealPlanCode;

    /**
     * @var string[]
     * @ODM\Field(type="collection")
     */
    public $inclusions;

    /**
     * @var PropertyProductStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus::class)
     */
    public $status;

    protected $defaults = [
        'status' => PropertyProductStatus::ACTIVE,
    ];

    /**
     * @ODM\PrePersist
     * @ODM\PreUpdate
     */
    public function autofillInclusions()
    {
        if(!$this->inclusions) {
            $this->inclusions = $this->mealPlanCode->inclusions();
        }
    }
}
