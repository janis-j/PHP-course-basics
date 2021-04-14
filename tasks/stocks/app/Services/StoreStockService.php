<?php

namespace App\Services;

use App\Models\Stock;
use App\Models\StocksCollection;
use App\Repositories\Stocks\StocksRepository;

class StoreStockService
{
    private StocksRepository $stocksRepository;

    public function __construct(StocksRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
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
        return $this->stocksRepository->getStocks()->collection();
    }
}