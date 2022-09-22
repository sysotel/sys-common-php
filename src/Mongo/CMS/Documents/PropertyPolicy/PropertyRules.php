<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class PropertyRules extends EmbeddedDocument
{
    /**
     * @var GuestDocumentRule
     * @ODM\EmbedOne (targetDocument=GuestDocumentRule::class)
     */
    public $guestDocumentRule;

    /**
     * @var UnmarriedCoupleRule
     * @ODM\EmbedOne (targetDocument=UnmarriedCoupleRule::class)
     */
    public $unmarriedCoupleRule;

    /**
     * @var BachelorsRule
     * @ODM\EmbedOne (targetDocument=BachelorsRule::class)
     */
    public $bachelorsRule;

    /**
     * @var PetsRule
     * @ODM\EmbedOne (targetDocument=PetsRule::class)
     */
    public $petsRule;

    /**
     * @var OutsideFoodRule
     * @ODM\EmbedOne (targetDocument=OutsideFoodRule::class)
     */
    public $outsideFoodRule;
}
