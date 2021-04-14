<?php

namespace App\Repositories\Stocks;

use App\Models\Stock;

interface StocksRepository
{
    public function save(Stock $stock): void;

    public function getStocks(): ?Stock;

    public function sellStocks(string $id): void;

    public function executeDescription(array $idDescription): void;
}