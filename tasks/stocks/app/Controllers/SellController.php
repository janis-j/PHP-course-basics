<?php

namespace App\Controllers;

use App\Services\StoreStockService;

class SellController
{
    private StoreStockService $storeStockService;

    public function __construct(StoreStockService $storeStockService)
    {

        $this->storeStockService = $storeStockService;
    }

    public function index(array $vars)
    {
        $this->storeStockService->sellStock($vars['id']);
        header('Location: /');
    }
}