<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Amenity;

use Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\CanResolveStringID;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\AmenityCategory;
use SYSOTEL\APP\Common\Enums\CMS\AmenityStatus;
use SYSOTEL\APP\Common\Enums\CMS\AmenityTarget;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;

/**
 * @ODM\Document(collection="amenities")
 */
class Amenity extends BaseDocument
{
    use HasTimestamps;
    use CanResolveStringID;

    /**
     * @var string
     * @ODM\Id(strategy="none", type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityTarget::class))
     */
    protected $id;

    /**
     * @var AmenityTarget
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityTarget::class)
     */
    protected $target;

    /**
     * @var AmenityCategory
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityCategory::class)
     */
    protected $category;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $description;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    protected $isFeatured;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $featureOrder;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    protected $categoryOrder;

    /**
     * @var AmenityStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\AmenityCategory::class)
     */
    protected $status;

    /**
     * @var AmenityDetailsTemplate
     * @ODM\EmbedOne (targetClass=AmenityDetailsTemplate::class)
     */
    protected $template;
}
