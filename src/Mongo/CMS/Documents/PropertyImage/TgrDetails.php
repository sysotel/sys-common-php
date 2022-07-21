<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\MongoODM\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 */
class TgrDetails extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $url;

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'url' => $this->url,
        ];
    }
}
