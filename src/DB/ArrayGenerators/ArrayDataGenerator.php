<?php


namespace SYSOTEL\APP\Common\DB\ArrayGenerators;


abstract class ArrayDataGenerator
{
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
