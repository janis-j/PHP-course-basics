<?php

namespace App\Services;

use App\Models\Stock;
use App\Models\StocksCollection;
use App\Repositories\Stocks\StocksRepository;

class StoreStocksService
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
            $request->price()
        );
            $this->stocksRepository->save($stock);
    }

    public function executeSearch(): StocksCollection
    {
        $collection = new StocksCollection();
        foreach ($this->stocksRepository->getStocks() as $stock) {
            $collection->add(new Stock(
                $stock["id"],
                $stock["name"],
                $stock["amount"],
                $stock["price"],
            ));
        }
        return $collection;
    }
}