<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyPolicy;

use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertySpaceER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\InventorySettings;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceOccupancy;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;
use SYSOTEL\APP\Common\Enums\CMS\Account;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;

/**
 * @property ?int $infantAgeThreshold
 * @property ?int $childAgeThreshold
 * @property ?int $freeChildAgeThreshold
 * @property ?int $noOfFreeChildGranted
*/
class AgePolicy extends Model
{
    /**
     * @return string
     */
    public function infantAgeDefinition(): string
    {
        return "Guest with age {$this->infantAgeThreshold} or below is considered an infant.";
    }

    /**
     * @return string
     */
    public function childAgeDefinition(): string
    {
        return "Guest with age between {$this->infantAgeThreshold} and {$this->childAgeThreshold} is considered a child.";
    }

    /**
     * @return string
     */
    public function adultAgeDefinition(): string
    {
        return "Guest with age above {$this->childAgeThreshold} is considered an adult.";
    }

    /**
     * @return string
     */
    public function freeChildDefinition(): string
    {
        if(!$this->noOfFreeChildGranted || !$this->freeChildAgeThreshold) {
            return '';
        }

        $child = $this->noOfFreeChildGranted > 1 ? 'children' : 'child';
        $year = $this->freeChildAgeThreshold > 1 ? 'years' : 'year';

        return "{$this->noOfFreeChildGranted} $child below {$this->freeChildAgeThreshold} $year stays FREE !";
    }

    /**
     * @return string[]
     */
    public function fullDescriptionArray(): array
    {
        return array_filter([
            $this->infantAgeDefinition(),
            $this->childAgeDefinition(),
            $this->adultAgeDefinition(),
            $this->freeChildDefinition(),
        ]);
    }

    public function getFullDescription(): string
    {
        return implode(', ', $this->fullDescriptionArray());
    }
}
