<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertySpace;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceViewCode;

/**
 * @ODM\EmbeddedDocument
 */
class SpaceView extends EmbeddedDocument
{
    /**
     * @var ?PropertySpaceViewCode
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertySpaceViewCode::class)
     */
    protected $code;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $description;

    /**
     * @ODM\PrePersist
    */
    public function prePersist()
    {
        if(!isset($this->name) && isset($this->code)) {
            $this->name = readableConstant($this->code->value);
        }
    }

    /**
     * @return PropertySpaceViewCode|null
     */
    public function getCode(): ?PropertySpaceViewCode
    {
        return $this->code;
    }

    /**
     * @param PropertySpaceViewCode|null $code
     * @return SpaceView
     */
    public function setCode(?PropertySpaceViewCode $code): SpaceView
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return SpaceView
     */
    public function setName(?string $name): SpaceView
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return SpaceView
     */
    public function setDescription(?string $description): SpaceView
    {
        $this->description = $description;
        return $this;
    }
}
