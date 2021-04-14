<?php

namespace App\Controllers;

use App\Services\QuoteStockService;
use App\Services\StoreStockRequest;
use App\Services\StoreStockService;
use App\Services\StoreMoneyService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BuyController
{
    private Environment $twig;
    private QuoteStockService $quoteStockService;
    private StoreStockService $storeStockService;
    private StoreMoneyService $storeMoneyService;

    public function __construct(
        QuoteStockService $quoteStockService,
        StoreStockService $storeStockService,
        StoreMoneyService $storeMoneyService
    )
    {
        $this->quoteStockService = $quoteStockService;
        $this->storeStockService = $storeStockService;
        $this->storeMoneyService = $storeMoneyService;
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    public function buy()
    {
        $name = strtoupper($_POST['name']);
        $amount = $_POST['amount'];
        $price = $this->quoteStockService->executeSearch($name);
        $time = time();
        $this->storeStockService->executeStore(
            new StoreStockRequest(
                0,
                $name,
                $amount,
                $price,
                $time
            )
        );
        if (!$this->storeMoneyService->execute($price * $amount)) {
            $_SESSION['_message']['errorMsg'] = 'Insufficient funds!!!';
        }
        header('location: /');
    }
}