<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Amenity;

use Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\CanResolveStringID;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\AmenityCategory;
use SYSOTEL\APP\Common\Enums\CMS\AmenityStatus;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;

/**
 * @ODM\Document(collection="emenities")
 */
class Amenity extends Document
{
    use HasTimestamps;
    use CanResolveStringID;

    /**
     * @var string
     * @ODM\Id(strategy="none", type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityTarget::class))
     */
    public $id;

    /**
     * @var AmenityTarget
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityTarget::class)
     */
    public $target;

    /**
     * @var AmenityCategory
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityCategory::class)
     */
    public $category;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $description;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    public $isFeatured;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $featureOrder;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $categoryOrder;

    /**
     * @var AmenityStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityCategory::class)
     */
    public $status;

    /**
     * @var AmenityDetailsTemplate
     * @ODM\EmbedMany (targetClass=AmenityDetailsTemplate::class)
     */
    public $template;
}
