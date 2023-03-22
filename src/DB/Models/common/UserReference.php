<?php

namespace SYSOTEL\APP\Common\DB\Models\common;

use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\UserType;

/**
 * @property ?int $id
 * @property ?UserType $type
 * @property ?string $name
 * @property ?string $email
 */
class UserReference extends EmbeddedModel
{
    protected $attributes = [
        'type' => UserType::class,
    ];

    /**
     * @param $value
     * @return int|null
     */
    public function getIdAttribute($value = null): ?int
    {
        return isset($this->id) ? (int) $this->id : null;
    }
}
