<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct;

use \Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\MealPlanCode;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAutoIncrementId;

/**
 * @ODM\Document(
 *     collection="cms_propertyProducts",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyProductRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class PropertyProduct extends Document
{
    use HasAccountId;
    use HasAutoIncrementId;
    use CanResolveIntegerID;
    use HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $propertyID;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $spaceID;

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
     */
    public function prePersist()
    {
        if(!$this->inclusions) {
            $this->inclusions = $this->mealPlanCode->inclusions();
        }
    }
}
