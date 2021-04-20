<?php

namespace App\Repositories\Stocks;

use App\Models\Stock;
use App\Models\StocksCollection;

interface StocksRepository
{
    public function save(Stock $stock): void;

    public function getStocks(): ?StocksCollection;

    public function sellStock(string $id): void;

    public function getStock(int $id): ?Stock;
}