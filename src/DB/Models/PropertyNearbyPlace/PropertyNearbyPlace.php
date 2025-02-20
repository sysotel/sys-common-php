<?php

namespace SYSOTEL\APP\Common\DB\Models\PropertyNearbyPlace;

use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use SYSOTEL\APP\Common\DB\Helpers\NumericIdGenerator;
use SYSOTEL\APP\Common\DB\Models\Model;
use SYSOTEL\APP\Common\DB\Models\PropertyNearbyPlace\embedded\NearbyPlaceItem;
use SYSOTEL\APP\Common\Enums\CMS\Account;

/**
 * @property ?int $id
 * @property ?Account $accountId
 * @property ?int $propertyId
 * @property ?Collection $places
 */
class PropertyNearbyPlace extends Model
{
    protected $collection = 'propertyNearbyPlaces';
    protected $casts = [
        'accountId' => Account::class,
    ];

    public function places(): EmbedsMany
    {
        return $this->embedsMany(NearbyPlaceItem::class);
    }

    public function addPlace(NearbyPlaceItem $val): static
    {
        $this->places()->save($val);
        return $this;
    }

    public function generateNewPlaceId(): int
    {
        $value = 0;
        foreach($this->places as $place){
            if($place->id > $value){
                $value = $place->id;
            }
        }
        return ++$value;
    }

    public function getPlaceById(int $id): ?NearbyPlaceItem
    {
        return $this->places()->find($id);
    }

}
