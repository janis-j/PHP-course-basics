<?php

namespace App\Models;

class StocksCollection
{
    private array $collection;

    public function collection(): array
    {
        $stocksList = [];
        foreach($this->collection as $stock){
            $stocksList[] = $stock->toArray();
        }
        return $stocksList;
    }

    public function add(Stock $stock): void
    {
        $this->collection[] = $stock;
    }
}