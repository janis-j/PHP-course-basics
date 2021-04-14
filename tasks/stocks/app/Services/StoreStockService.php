<?php

namespace App\Services;

use App\Models\Stock;
use App\Repositories\Stocks\StocksRepository;

class StoreStockService
{
    private StocksRepository $stocksRepository;
    private QuoteStockService $quoteStockService;

    public function __construct(
        StocksRepository $stocksRepository,
        QuoteStockService $quoteStockService
    )
    {
        $this->stocksRepository = $stocksRepository;
        $this->quoteStockService = $quoteStockService;
    }

    public function executeStore(StoreStockRequest $request): void
    {
        $stock = new Stock(
            $request->id(),
            $request->name(),
            $request->amount(),
            $request->price(),
            $request->timestamp()
        );

        $this->stocksRepository->save($stock);
    }

    public function executeSearch(): array
    {
        $newCollection = [];
        $collection = $this->stocksRepository->getStocks()->collection();
        foreach ($collection as $stock) {
            $newCollection[] = array_merge(['actual_price' => $this->quoteStockService->executeSearch($stock['name'])], $stock);
        }
       return $newCollection;
    }
}