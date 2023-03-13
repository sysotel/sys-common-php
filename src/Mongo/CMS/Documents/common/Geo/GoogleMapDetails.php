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
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $placeId;

    /**
     * @var ?string
     * @ODM\Field(type="string")
     */
    protected $phone;

    /**
     * @return string|null
     */
    public function getPlaceId(): ?string
    {
        return $this->placeId;
    }

    /**
     * @param string|null $placeId
     * @return GoogleMapDetails
     */
    public function setPlaceId(?string $placeId): GoogleMapDetails
    {
        $this->placeId = $placeId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return GoogleMapDetails
     */
    public function setPhone(?string $phone): GoogleMapDetails
    {
        $this->phone = $phone;
        return $this;
    }
}
