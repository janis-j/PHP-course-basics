<?php

namespace App\Services;

use App\Repositories\FinnhubStocks\QuoteStocksRepository;

class QuoteStockService
{
    private QuoteStocksRepository $stocksRepository;

    public function __construct(QuoteStocksRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
    }

    public function executeSearch(string $name): int
    {
      return $this->stocksRepository->quote($name);
    }
}