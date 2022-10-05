<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Http;

use Delta4op\Mongodb\Traits\HasTimestamps;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Enums\HttpRequestMethod;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\KeyValueItem;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class Request extends EmbeddedDocument
{
    use HasTimestamps;

    /**
     * @var ?HttpRequestMethod
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\HttpRequestMethod::class)
     */
    protected $method;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $endpoint;

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
     * @return HttpRequestMethod|null
     */
    public function getMethod(): ?HttpRequestMethod
    {
        return $this->method;
    }

    /**
     * @param HttpRequestMethod|null $method
     * @return Request
     */
    public function setMethod(?HttpRequestMethod $method): Request
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    /**
     * @param string|null $endpoint
     * @return Request
     */
    public function setEndpoint(?string $endpoint): Request
    {
        $this->endpoint = $endpoint;
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
     * @return Request
     */
    public function setHeaders(ArrayCollection|KeyValueItem $headers): Request
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
     * @return Request
     */
    public function setPayload(?string $payload): Request
    {
        $this->payload = $payload;
        return $this;
    }
}
