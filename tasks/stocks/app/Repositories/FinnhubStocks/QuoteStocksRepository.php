<?php

namespace App\Repositories\FinnhubStocks;

use Finnhub\Model\Quote;

interface QuoteStocksRepository
{
    public function quote(string $name): int;
}