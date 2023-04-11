<?php


namespace SYSOTEL\APP\Common\DB\Models\common\Http;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\common\KeyValueItem;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\HttpRequestMethod;

/**
 * @property ?HttpRequestMethod $method
 * @property ?string $endpoint
 * @property ?Collection $headers
 * @property ?string $payload
 */
class Request extends EmbeddedModel
{
    protected $casts = [
        'method' => HttpRequestMethod::class,
    ];

    public function headers(): EmbedsMany
    {
        return $this->embedsMany(KeyValueItem::class);
    }

    public function setHeadersFromArray(array $headers): self
    {
        $this->headers()->delete();
        foreach ($headers as $key => $value) {

            $keyValueItem = new KeyValueItem();
            $keyValueItem->key = $key;
            $keyValueItem->value = $value;

             $this->headers()->associate($keyValueItem);
        }
        return $this;
    }
}
