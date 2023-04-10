<?php

namespace SYSOTEL\APP\Common;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SYSOTEL\APP\Common\DB\Models\Promotions\Promotion;
use SYSOTEL\APP\Common\DB\Models\Property\Property;
use SYSOTEL\APP\Common\DB\Models\PropertyPolicy\PropertyPolicies;
use SYSOTEL\APP\Common\DB\Models\PropertyProduct\PropertyProduct;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\embedded\SpaceView;
use SYSOTEL\APP\Common\DB\Models\PropertySpace\PropertySpace;
use SYSOTEL\APP\Common\DB\Observers\PromotionObserver;
use SYSOTEL\APP\Common\DB\Observers\PropertyObserver;
use SYSOTEL\APP\Common\DB\Observers\PropertyPolicyObserver;
use SYSOTEL\APP\Common\DB\Observers\PropertyProductObserver;
use SYSOTEL\APP\Common\DB\Observers\PropertySpaceObserver;
use SYSOTEL\APP\Common\DB\Observers\SpaceViewObserver;

class EventServiceProvider extends ServiceProvider
{
    protected $observers = [
        Property::class => [PropertyObserver::class],
        PropertySpace::class => [PropertySpaceObserver::class],
        SpaceView::class => [SpaceViewObserver::class],
        PropertyProduct::class => [PropertyProductObserver::class],
        PropertyPolicies::class => [PropertyPolicyObserver::class],
        Promotion::class => [PromotionObserver::class],
    ];
}
