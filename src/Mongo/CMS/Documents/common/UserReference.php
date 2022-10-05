<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\UserType;

/**
 * @ODM\EmbeddedDocument
 */
class UserReference extends EmbeddedDocument
{
    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    public $id;

    /**
     * @var ?UserType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\UserType::class)
     */
    public $type;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    public $name;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    public $email;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return UserReference
     */
    public function setId(?int $id): UserReference
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return UserType|null
     */
    public function getType(): ?UserType
    {
        return $this->type;
    }

    /**
     * @param UserType $type
     * @return UserReference
     */
    public function setType(UserType $type): UserReference
    {
        $this->type = $type;
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
     * @param string $name
     * @return UserReference
     */
    public function setName(string $name): UserReference
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserReference
     */
    public function setEmail(string $email): UserReference
    {
        $this->email = $email;
        return $this;
    }
}
