<?php

namespace App\Controllers;

use App\Services\QuoteStockService;
use App\Services\StoreStockRequest;
use App\Services\StoreStocksService;
use App\Services\StoreMoneyService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BuyController
{
    private Environment $twig;
    private QuoteStockService $quoteStockService;
    private StoreStocksService $storeStocksService;
    private StoreMoneyService $storeMoneyService;

    public function __construct(
        QuoteStockService $quoteStockService,
        StoreStocksService $storeStocksService,
        StoreMoneyService $storeMoneyService
    )
    {
        $this->quoteStockService = $quoteStockService;
        $this->storeStocksService = $storeStocksService;
        $this->storeMoneyService = $storeMoneyService;
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    public function buy()
    {
        $price = $this->quoteStockService->executeSearch($_POST['name']);
        $this->storeStocksService->executeStore(
            new StoreStockRequest(
                0,
                $_POST['name'],
                $_POST['amount'],
                $price
            )
        );
        if (!$this->storeMoneyService->execute($price * $_POST['amount'])) {
            $_SESSION['_message']['errorMsg'] = 'Insufficient funds!!!';
        }
        header('location: /');
    }
}