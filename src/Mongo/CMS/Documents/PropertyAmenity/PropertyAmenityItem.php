<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyAmenity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class PropertyAmenityItem extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\field(type="string")
     */
    protected $id;

    /**
     * @var bool
     * @ODM\field(type="bool")
     */
    protected $flag;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $note;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return PropertyAmenityItem
     */
    public function setId(string $id): PropertyAmenityItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFlag(): bool
    {
        return $this->flag;
    }

    /**
     * @param bool $flag
     * @return PropertyAmenityItem
     */
    public function setFlag(bool $flag): PropertyAmenityItem
    {
        $this->flag = $flag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     * @return PropertyAmenityItem
     */
    public function setNote(?string $note): PropertyAmenityItem
    {
        $this->note = $note;
        return $this;
    }
}
