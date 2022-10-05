<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Http;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\KeyValueItem;
/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class Response extends EmbeddedDocument
{
    use HasTimestamps;

    /**
     * @var ?int
     * @ODM\Field(type="int")
     */
    protected $statusCode;

    /**
     * @var ArrayCollection & KeyValueItem
     * @ODM\EmbedMany (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\KeyValueItem::class)
     */
    protected $headers;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $payload;

    /**
     * CONSTRUCTOR
     */
    public function __construct()
    {
        $this->headers = new ArrayCollection;
    }

    public function setHeadersFromArray(array $headers): self
    {
        $this->headers = new ArrayCollection;
        foreach($headers as $key => $value) {
            $this->headers->add(new KeyValueItem(compact('key', 'value')));
        }
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param int|null $statusCode
     * @return Response
     */
    public function setStatusCode(?int $statusCode): Response
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return ArrayCollection|KeyValueItem
     */
    public function getHeaders(): ArrayCollection|KeyValueItem
    {
        return $this->headers;
    }

    /**
     * @param ArrayCollection|KeyValueItem $headers
     * @return Response
     */
    public function setHeaders(ArrayCollection|KeyValueItem $headers): Response
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPayload(): ?string
    {
        return $this->payload;
    }

    /**
     * @param string|null $payload
     * @return Response
     */
    public function setPayload(?string $payload): Response
    {
        $this->payload = $payload;
        return $this;
    }
}
