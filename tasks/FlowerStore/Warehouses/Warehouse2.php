<?php

namespace FlowerStore;

class Warehouse2 implements iWarehouse
{
    private ProductCollection $warehouse;

    public function __construct()
    {
        $this->warehouse = new ProductCollection;

        $this->warehouse->add(new Product(new Flower('Orchid'), 30), 60);

        $this->warehouse->add(new Product(new Flower('Rose'), 20), 50);
    }

    public function getAllStock(): ProductCollection
    {
        return $this->warehouse;
    }

    public function setAmount(string $name, int $howMuch): int
    {
      return $this->warehouse->changeAmount($name, $howMuch);
    }
}