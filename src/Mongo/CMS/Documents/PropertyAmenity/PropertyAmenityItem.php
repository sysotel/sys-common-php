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
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $id;

    /**
     * @var ?bool
     * @ODM\field(type="bool")
     */
    protected $flag;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $note;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
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
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return bool|null
     */
    public function getFlag(): ?bool
    {
        return $this->flag;
    }

    /**
     * @param bool|null $flag
     */
    public function setFlag(?bool $flag): void
    {
        $this->flag = $flag;
    }


}
