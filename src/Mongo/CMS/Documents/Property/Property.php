<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Property;

use Delta4op\Mongodb\Documents\Document;
use Delta4op\Mongodb\Traits\CanResolveIntegerID;
use Delta4op\Mongodb\Traits\HasDefaultAttributes;
use Delta4op\Mongodb\Traits\HasTimestamps;
use Illuminate\Support\Str;
use SYSOTEL\APP\Common\Enums\CMS\PropertyStarRating;
use SYSOTEL\APP\Common\Enums\CMS\PropertyType;
use SYSOTEL\APP\Common\Enums\Currency;
use SYSOTEL\APP\Common\Enums\CMS\PropertyStatus;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\Address;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\RawAddress;
use SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyRepository;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAccountId;
use SYSOTEL\APP\Common\Mongo\CMS\Traits\HasAutoIncrementId;

/**
 * @ODM\Document(
 *     collection="properties",
 *     repositoryClass=SYSOTEL\APP\Common\Mongo\CMS\Repositories\PropertyRepository::class
 * )
 * @ODM\HasLifecycleCallbacks
 */
class Property extends Document
{
    use HasAccountId;
    use HasAutoIncrementId;
    use CanResolveIntegerID;
    use HasTimestamps;
    use HasDefaultAttributes;

    /**
     * @var string
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\Account::class)
     */
    public $accountId;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $slug;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $accountSlug;

    /**
     * @var Currency
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\Currency::class)
     */
    public $baseCurrency;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    public $displayName;

    /**
     * @var PropertyStarRating
     * @ODM\Field(type="int", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyStarRating::class)
     */
    public $starRating;

    /**
     * @var PropertyType
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyType::class)
     */
    public $type;

    /**
     * @var Address
     * @ODM\EmbedOne(targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Geo\Address::class)
     */
    public $address;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $noOfSpaces;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $noOfFloors;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    public $buildYear;

    /**
     * @var PropertyStatus
     * @ODM\Field(type="string", enumType=SYSOTEL\APP\Common\Enums\CMS\PropertyStatus::class)
     */
    public $status;


    protected $defaults = [
        'baseCurrency' => Currency::INR,
        'status'       => PropertyStatus::ACTIVE,
    ];

    public function generateSlug(): string
    {
        /** @var Property $result */
        /** @var PropertyRepository $repository */
        $repository = Property::repository();
        if (!$this->displayName) {
            abort(500, 'Cannot generate slug without displayName value');
        }

        $nameSlug = Str::slug($this->displayName);
        $result = $repository->findBySlug($nameSlug);
        if (!$result || $result->id === $this->id) {
            return $nameSlug;
        }

        /** @var Address|RawAddress|null $address */
        $address = $this->rawAddress ?? $this->address ?? null;

        if($address && $address->getCityName()) {

            $citySlug = Str::slug($address->getCityName());
            $nameCitySlug = "{$nameSlug}-{$citySlug}";
            $result = self::repository()->findBySlug($nameCitySlug);

            if (!$result || $result->id === $this->id) {
                return $nameCitySlug;
            }

            return "{$nameCitySlug}-{$this->id}";
        }

        return "{$nameSlug}-{$this->id}";
    }

    public function generateAccountSlug(): string
    {
        /** @var Property $result */
        /** @var PropertyRepository $repository */
        $repository = Property::repository();
        if (!$this->displayName) {
            abort(500, 'Cannot generate slug without displayName value');
        }

        $nameSlug = Str::slug($this->displayName);
        $result = $repository->findByAccountSlug($this->accountId, $nameSlug);
        if (!$result || $result->id === $this->id) {
            return $nameSlug;
        }

        /** @var Address|RawAddress|null $address */
        $address = $this->rawAddress ?? $this->address ?? null;

        if($address && $address->getCityName()) {

            $citySlug = Str::slug($address->getCityName());
            $nameCitySlug = "{$nameSlug}-{$citySlug}";
            $result = $repository->findByAccountSlug($this->accountId, $nameCitySlug);

            if (!$result || $result->id === $this->id) {
                return $nameCitySlug;
            }

            return "{$nameCitySlug}-{$this->id}";
        }

        return "{$nameSlug}-{$this->id}";
    }
}
