<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyProduct;

use \Delta4op\MongoODM\Documents\Document;
use Delta4op\MongoODM\Facades\DocumentManager;
use Delta4op\MongoODM\Traits\CanResolveIntegerID;
use Delta4op\MongoODM\Traits\HasDefaultAttributes;
use Delta4op\MongoODM\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\MealPlanCode;
use SYSOTEL\APP\Common\Enums\CMS\PropertyProductStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyProductRepository;
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
        'status'     => PropertyProductStatus::ACTIVE,
    ];

    /**
     * @ODM\PrePersist
     */
    public function prePersist()
    {
        if(!$this->inclusions) {
            $this->inclusions = array_merge(match($this->mealPlanCode){
                MealPlanCode::CP  => ['FREE Breakfast'],
                MealPlanCode::MAP => ['FREE Breakfast', 'FREE Lunch or Dinner'],
                MealPlanCode::AP  => ['FREE Breakfast', 'All Meals FREE'],
                default => []
            });
        }
    }

    /**
     * User Repository
     *
     * @return PropertyProductRepository
     */
    public static function repository(): PropertyProductRepository
    {
        return DocumentManager::getRepository(self::class);
    }
}
