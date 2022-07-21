<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceViewCode;
use function SYSOTEL\App\Helpers\Functions\readableConstant;

/**
 * @ODM\EmbeddedDocument
 * @ODM\EmbeddedDocument
 */
class SpaceView extends EmbeddedDocument
{
    /**
     * @var PropertySpaceViewCode
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertySpaceViewCode::class)
     */
    public $code;

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
     * @ODM\PrePersist
    */
    public function prePersist()
    {
        if(!isset($this->name) && isset($this->code)) {
            $this->name = readableConstant($this->code->value);
        }
    }
}
