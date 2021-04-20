<?php

namespace App\Services;

use App\Models\Stock;
use App\Repositories\Stocks\StocksRepository;
use App\Repositories\Wallet\WalletRepository;

class StoreStockService
{
    private StocksRepository $stocksRepository;
    private QuoteStockService $quoteStockService;
    private WalletRepository $walletRepository;

    public function __construct(
        StocksRepository $stocksRepository,
        QuoteStockService $quoteStockService,
        WalletRepository $walletRepository
    )
    {
        $this->stocksRepository = $stocksRepository;
        $this->quoteStockService = $quoteStockService;
        $this->walletRepository = $walletRepository;
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
            $newCollection[] = array_merge(['actual_price' => $this->quoteStockService->executeSearch($stock['name'])],
                $stock);
        }
        return $newCollection;
    }

    public function sellStock(int $id): void
    {
        $stock = $this->stocksRepository->getStock($id);
        $actualPrice = $this->quoteStockService->executeSearch($stock->name());
        $this->walletRepository->change($stock->amount() * $actualPrice);
        $this->stocksRepository->sellStock($id);
    }
}