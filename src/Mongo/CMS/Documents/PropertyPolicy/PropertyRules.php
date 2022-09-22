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
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\GuestDocumentRule::class)
     */
    public $guestDocumentRule;

    /**
     * @var UnmarriedCoupleRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\UnmarriedCoupleRule::class)
     */
    public $unmarriedCoupleRule;

    /**
     * @var BachelorsRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\BachelorsRule::class)
     */
    public $bachelorsRule;

    /**
     * @var PetsRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\PetsRule::class)
     */
    public $petsRule;

    /**
     * @var OutsideFoodRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\OutsideFoodRule::class)
     */
    public $outsideFoodRule;

    public function description()
    {
        $rules = [];

        if($this->bachelorsRule) {
            $rules[] = $this->bachelorsRule->description();
        }

        if($this->petsRule) {
            $rules[] = $this->petsRule->description();
        }

        if($this->unmarriedCoupleRule) {
            $rules[] = $this->unmarriedCoupleRule->description();
        }

        if($this->guestDocumentRule) {
            $rules[] = $this->guestDocumentRule->description();
        }

        if($this->outsideFoodRule) {
            $rules[] = $this->guestDocumentRule->description();
        }

        return $rules;
    }
}
