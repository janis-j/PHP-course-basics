<?php

namespace App1\Models;

class TransportCollection
{
    private array $collection;

    public function addOne(CarRent $transport): void
    {
        $this->collection[] = $transport;
    }

    public function collection(): array
    {
        return $this->collection;
    }
}