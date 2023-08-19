<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Promotions;

use Delta4op\Mongodb\Documents\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Enums\CMS\ChannelId;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class LocationChannel extends EmbeddedDocument
{
    /**
     * @var ?ChannelId
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\ChannelId::class)
     */
    protected $channelId;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $mappedId;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $mappedName;

    /**
     * @return ChannelId|null
     */
    public function getChannelId(): ?ChannelId
    {
        return $this->channelId;
    }

    /**
     * @param ChannelId|null $channelId
     */
    public function setChannelId(?ChannelId $channelId): void
    {
        $this->channelId = $channelId;
    }

    /**
     * @return string|null
     */
    public function getMappedId(): ?string
    {
        return $this->mappedId;
    }

    /**
     * @param string|null $mappedId
     */
    public function setMappedId(?string $mappedId): void
    {
        $this->mappedId = $mappedId;
    }

    /**
     * @return string|null
     */
    public function getMappedName(): ?string
    {
        return $this->mappedName;
    }

    /**
     * @param string|null $mappedName
     */
    public function setMappedName(?string $mappedName): void
    {
        $this->mappedName = $mappedName;
    }
}
