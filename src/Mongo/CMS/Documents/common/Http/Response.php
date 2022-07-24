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
     * @var int
     * @ODM\Field(type="int")
     */
    public $statusCode;

    /**
     * @var ArrayCollection & KeyValueItem
     * @ODM\EmbedMany (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\KeyValueItem::class)
     */
    public $headers;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $payload;

    /**
     * CONSTRUCTOR
     */
    public function __construct(array $attributes = [])
    {
        $this->headers = new ArrayCollection;

        parent::__construct($attributes);
    }

    public function setHeadersFromArray(array $headers): self
    {
        $this->headers = new ArrayCollection;
        foreach($headers as $key => $value) {
            $this->headers->add(new KeyValueItem(compact('key', 'value')));
        }
        return $this;
    }
}
