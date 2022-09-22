<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\BachelorsRule;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\GuestDocumentRule;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\OutsideFoodRule;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\PetsRule;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\UnmarriedCoupleRule;

/**
 * @ODM\EmbeddedDocument
 */
class PropertyRules extends EmbeddedDocument
{
    /**
     * @var GuestDocumentRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Rules\GuestDocumentRule::class)
     */
    public $guestDocumentRule;

    /**
     * @var UnmarriedCoupleRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Rules\UnmarriedCoupleRule::class)
     */
    public $unmarriedCoupleRule;

    /**
     * @var BachelorsRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Rules\BachelorsRule::class)
     */
    public $bachelorsRule;

    /**
     * @var PetsRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Rules\PetsRule::class)
     */
    public $petsRule;

    /**
     * @var OutsideFoodRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\Rules\OutsideFoodRule::class)
     */
    public $outsideFoodRule;
}
