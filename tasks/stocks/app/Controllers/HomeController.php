<?php

namespace App\Controllers;

use App\Services\StoreStockService;
use App\Services\StoreMoneyService;
use NumberFormatter;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    private StoreStockService $storeStockService;
    private StoreMoneyService $storeMoneyService;
    private Environment $twig;

    public function __construct(StoreStockService $storeStockService,
                                StoreMoneyService $storeMoneyService
    )
    {
        $this->storeStockService = $storeStockService;
        $this->storeMoneyService = $storeMoneyService;
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    public function index(): string
    {
        $f = new NumberFormatter("en", NumberFormatter::CURRENCY);
        $errorMsg = '';
        $balance = $this->storeMoneyService->balance();
        if (isset($_SESSION['_message']['errorMsg'])) {
            $errorMsg = $_SESSION['_message']['errorMsg'];
        }
        return $this->twig->render('HomeView.twig', [
            'errorMsg' => $errorMsg,
            'balance' => $f->formatCurrency($balance / 100, "USD"),
            'stockList' => $this->storeStockService->executeSearch()
        ]);
    }
}