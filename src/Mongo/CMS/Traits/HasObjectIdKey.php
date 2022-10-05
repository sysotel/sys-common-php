<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait HasObjectIdKey
{
    /**
     * @var string
     * @ODM\Id
     */
    protected $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
