<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class GoogleMapDetails extends EmbeddedDocument
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $placeId;

    /**
     * @return string
     */
    public function getPlaceId(): string
    {
        return $this->placeId;
    }

    /**
     * @param string $placeId
     * @return GoogleMapDetails
     */
    public function setPlaceId(string $placeId): GoogleMapDetails
    {
        $this->placeId = $placeId;
        return $this;
    }
    
}
