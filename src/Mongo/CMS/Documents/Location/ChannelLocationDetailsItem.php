<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Location;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class ChannelLocationDetailsItem extends EmbeddedDocument
{
    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $channelId;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $id;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $code;

    /**
     * @var ?string
     * @ODM\field(type="string")
     */
    protected $name;
}
