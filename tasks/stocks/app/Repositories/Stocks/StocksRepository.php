<?php

namespace App\Repositories\Stocks;

use App\Models\Stock;
use App\Models\StocksCollection;

interface StocksRepository
{
    public function save(Stock $stock): void;

    public function getStocks(): ?StocksCollection;

    public function sellStocks(string $id): void;

    public function executeDescription(array $idDescription): void;
}