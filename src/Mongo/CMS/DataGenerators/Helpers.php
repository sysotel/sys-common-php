<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\DataGenerators;

use SYSOTEL\APP\Common\Mongo\CMS\Documents\BaseDocument;

trait Helpers
{
    /**
     * @param $document
     * @return static
     */
    public static function create($document): static
    {
        return new static($document);
    }

    /**
     * @var array
     */
    protected array $data = [];

    /**
     * @param array $append
     * @return static
     */
    protected function appendData(array $append): static
    {
        $this->data = array_merge($this->data, $append);
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
