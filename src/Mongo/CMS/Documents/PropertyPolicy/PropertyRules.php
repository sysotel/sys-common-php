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
     * @var ?GuestDocumentRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\GuestDocumentRule::class)
     */
    protected $guestDocumentRule;

    /**
     * @var ?UnmarriedCoupleRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\UnmarriedCoupleRule::class)
     */
    protected $unmarriedCoupleRule;

    /**
     * @var ?BachelorsRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\BachelorsRule::class)
     */
    protected $bachelorsRule;

    /**
     * @var ?PetsRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\PetsRule::class)
     */
    protected $petsRule;

    /**
     * @var ?OutsideFoodRule
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyPolicy\Rules\OutsideFoodRule::class)
     */
    protected $outsideFoodRule;

    /**
     * @return GuestDocumentRule|null
     */
    public function getGuestDocumentRule(): ?GuestDocumentRule
    {
        return $this->guestDocumentRule;
    }

    /**
     * @param GuestDocumentRule|null $guestDocumentRule
     * @return PropertyRules
     */
    public function setGuestDocumentRule(?GuestDocumentRule $guestDocumentRule): PropertyRules
    {
        $this->guestDocumentRule = $guestDocumentRule;
        return $this;
    }

    /**
     * @return UnmarriedCoupleRule|null
     */
    public function getUnmarriedCoupleRule(): ?UnmarriedCoupleRule
    {
        return $this->unmarriedCoupleRule;
    }

    /**
     * @param UnmarriedCoupleRule|null $unmarriedCoupleRule
     * @return PropertyRules
     */
    public function setUnmarriedCoupleRule(?UnmarriedCoupleRule $unmarriedCoupleRule): PropertyRules
    {
        $this->unmarriedCoupleRule = $unmarriedCoupleRule;
        return $this;
    }

    /**
     * @return BachelorsRule|null
     */
    public function getBachelorsRule(): ?BachelorsRule
    {
        return $this->bachelorsRule;
    }

    /**
     * @param BachelorsRule|null $bachelorsRule
     * @return PropertyRules
     */
    public function setBachelorsRule(?BachelorsRule $bachelorsRule): PropertyRules
    {
        $this->bachelorsRule = $bachelorsRule;
        return $this;
    }

    /**
     * @return PetsRule|null
     */
    public function getPetsRule(): ?PetsRule
    {
        return $this->petsRule;
    }

    /**
     * @param PetsRule|null $petsRule
     * @return PropertyRules
     */
    public function setPetsRule(?PetsRule $petsRule): PropertyRules
    {
        $this->petsRule = $petsRule;
        return $this;
    }

    /**
     * @return OutsideFoodRule|null
     */
    public function getOutsideFoodRule(): ?OutsideFoodRule
    {
        return $this->outsideFoodRule;
    }

    /**
     * @param OutsideFoodRule|null $outsideFoodRule
     * @return PropertyRules
     */
    public function setOutsideFoodRule(?OutsideFoodRule $outsideFoodRule): PropertyRules
    {
        $this->outsideFoodRule = $outsideFoodRule;
        return $this;
    }

    /**
     * @return array
     */
    public function description(): array
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

        return array_filter($rules, function($rule){
            return !empty($rule);
        });
    }
}
