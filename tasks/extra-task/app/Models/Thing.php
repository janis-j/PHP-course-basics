<?php

namespace Application\Product;

class Product
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name():string
    {
        return $this->name;
    }
}