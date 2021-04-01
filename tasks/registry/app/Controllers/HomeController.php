<?php

namespace App\Controllers;

use App\Services\StorePersonRequest;
use App\Services\StorePersonService;

class HomeController
{
    private StorePersonService $service;

    public function __construct(StorePersonService $storePersonService)
    {
        $this->service = $storePersonService;
    }

    public function index()
    {
        require_once '../app/Views/HomeView.php';
    }

    public function search()
    {
        $collection = $this->service->executeSearch();
        require_once '../app/Views/HomeView.php';
    }

    public function store()
    {

        $this->service->executeStore(new StorePersonRequest(
            $_POST["id"],
            $_POST["name"],
            $_POST["surname"],
            $_POST["description"]
        ));

        require_once '../app/Views/HomeView.php';
    }
}