<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertySpaceER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\Rules\BachelorsRule;
use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\Rules\GuestDocumentRule;
use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\Rules\OutsideFoodRule;
use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\Rules\PetsRule;
use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\Rules\UnmarriedCoupleRule;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\InventorySettings;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;

/**
 * @property ?GuestDocumentRule $guestDocumentRule
 * @property ?UnmarriedCoupleRule $unmarriedCoupleRule
 * @property ?BachelorsRule $bachelorsRule
 * @property ?PetsRule $petsRule
 * @property ?OutsideFoodRule $outsideFoodRule

*/
class PropertyRules extends EmbeddedModel
{

    public function guestDocumentRule(): EmbedsOne
    {
        return $this->embedsOne(GuestDocumentRule::class);
    }

    public function unmarriedCoupleRule(): EmbedsOne
    {
        return $this->embedsOne(UnmarriedCoupleRule::class);
    }

    public function outsideFoodRule(): EmbedsOne
    {
        return $this->embedsOne(OutsideFoodRule::class);
    }

    public function petsRule(): EmbedsOne
    {
        return $this->embedsOne(PetsRule::class);
    }

    public function bachelorsRule(): EmbedsOne
    {
        return $this->embedsOne(BachelorsRule::class);
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
