<?php


namespace SYSOTEL\APP\Common\DB\Models\common;

use Carbon\Carbon;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use SYSOTEL\APP\Common\DB\Models\EmbeddedModel;
use SYSOTEL\APP\Common\Enums\UserType;
use SYSOTEL\APP\Common\Enums\VerificationStatus;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\UserReference;

/**
 * @property ?VerificationStatus $status
 * @property ?bool $isAutoVerified
 * @property ?string $remark
 * @property ?Carbon $verifiedAt
 * @property ?UserReference $causer

 */
class Verification extends EmbeddedModel
{
    protected $attributes = [
        'status' => VerificationStatus::class,
    ];


    public function causer(): EmbedsOne
    {
        return $this->embedsOne(UserReference::class);
    }

    public static function defaultDocument(): Verification
    {
        return new self(['status' => VerificationStatus::PENDING]);
    }

    public static function autoVerifiedDocument(): Verification
    {
        return new self([
            'status' => VerificationStatus::PENDING,
            'isAutoVerified' => true
        ]);
    }

    public function verify($status)
    {
        $this->status = $status;
        $this->verifiedAt = Carbon::now();
        $this->save();
    }

}
