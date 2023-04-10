<?php


namespace SYSOTEL\APP\Common\DB\Models\common\Http;

use Jenssegers\Mongodb\Collection;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use SYSOTEL\APP\Common\DB\Models\common\KeyValueItem;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;

/**
 * @property ?int $statusCode
 * @property ?Collection $headers
 * @property ?string $payload
 */
class Response extends EmbeddedModel
{
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
