<?php

namespace SYSOTEL\APP\Common\DB\Models\Promotions;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PromotionEQB;
use SYSOTEL\APP\Common\DB\EloquentQueryBuilders\PropertySpaceEQB;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PromotionER;
use SYSOTEL\APP\Common\DB\EloquentRepositories\PropertySpaceER;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\Promotions\EarlyBirdPromotion\EarlyBirdPromotion;
use SYSOTEL\APP\Common\DB\Models\Promotions\EarlyBirdPromotion\EarlyBirdPromotionDetails;
use SYSOTEL\APP\Common\DB\Models\Promotions\LastMinutePromotion\LastMinutePromotion;
use SYSOTEL\APP\Common\DB\Models\Promotions\LastMinutePromotion\LastMinutePromotionDetails;
use SYSOTEL\APP\Common\Enums\CMS\DateRestrictionType;
use SYSOTEL\APP\Common\Enums\CMS\PromotionStatus;
use SYSOTEL\APP\Common\Enums\CMS\PromotionType;
use SYSOTEL\APP\Common\Enums\CMS\PropertySpaceStatus;
use SYSOTEL\APP\Common\Enums\CMS\SpaceStayType;

/**
 * @property ?int $id
 * @property ?int $propertyId
 * @property ?string $promoId
 * @property ?string $internalName
 * @property ?string $displayName
 * @property ?PromotionStatus $status
 * @property ?DateRestrictionType $dateRestrictionType
 * @property ?BookingTimespan $bookingTimeSpan
 * @property ?StayTimespan $stayTimeSpan
 * @property ?BasicPromotionDetails|LastMinutePromotionDetails|EarlyBirdPromotionDetails $details
 * @property ?Carbon $expiredAt
 * @property PromotionType $type
*/
class Promotion extends Model
{
    protected $collection = 'promotions';


    protected $casts = [
        'dateRestrictionType' => DateRestrictionType::class,
        'bookingTimeSpan' => BookingTimespan::class,
        'stayTimeSpan' => StayTimespan::class,
        'type' => PromotionType::class
    ];

    public function bookingTimeSpan(): EmbedsOne
    {
        return $this->embedsOne(BookingTimespan::class);
    }

    public function stayTimeSpan(): EmbedsOne
    {
        return $this->embedsOne(StayTimespan::class);
    }

    public function details(): ?EmbedsOne
    {
        if(PromotionType::tryFrom($this->type->value) === PromotionType::BASIC){
            return $this->embedsOne(BasicPromotion::class);
        }elseif(PromotionType::tryFrom($this->type->value) === PromotionType::LAST_MINUTE){
            return $this->embedsOne(LastMinutePromotion::class);
        }
        elseif(PromotionType::tryFrom($this->type->value) === PromotionType::EARLY_BIRD){
            return $this->embedsOne(EarlyBirdPromotion::class);
        }
        return null;

    }

    public static function query(): PromotionEQB
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): PromotionEQB
    {
        return new PromotionEQB($query);
    }

    /**
     * @return PromotionER
     */
    public static function repository(): PromotionER
    {
        return new PromotionER;
    }
}
