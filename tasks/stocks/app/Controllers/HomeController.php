<?php

namespace App\Controllers;

use App\Services\StoreStocksService;
use App\Services\StoreMoneyService;
use NumberFormatter;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    private StoreStocksService $storeStocksService;
    private StoreMoneyService $storeMoneyService;
    private Environment $twig;

    public function __construct(StoreStocksService $storeStocksService, StoreMoneyService $storeMoneyService)
    {
        $this->storeStocksService = $storeStocksService;
        $this->storeMoneyService = $storeMoneyService;
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    public function index(): string
    {
        $f = new NumberFormatter("en", NumberFormatter::CURRENCY);
        $errorMsg = '';
        $balance = $this->storeMoneyService->balance();
        if(isset($_SESSION['_message']['errorMsg'])){
            $errorMsg = $_SESSION['_message']['errorMsg'];
        }
        return $this->twig->render('HomeView.twig',[
            'errorMsg' => $errorMsg,
            'balance' => $f->formatCurrency($balance / 100, "EUR")
        ]);
    }

//    public function display()
//    {
//        echo $this->twig->render('HomeView.twig', [
//            'personsList' => $this->storeStocksService->executeSearch()->collection(),
//            'post' => $_POST
//        ]);
//    }

//    public function store()
//    {
//        $validation = new Validation();
//        $validId = $validation->id($_POST['id']);
//        $validName = $validation->oneWord($_POST['name']);
//        $validSurname = $validation->oneWord($_POST['surname']);
//        $validAge = $validation->oneWord($_POST['age']);


//        if ($validId === '' && $validName === '' && $validSurname === '') {
//            $this->service->executeStore(new StoreStockRequest(
//                $_POST["id"],
//                $_POST["name"],
//                $_POST["amount"],
//                $_POST["price"]
//            ));
//        }
//        echo $this->twig->render('HomeView.twig',
//            [
//                'validId' => $validId,
//                'validName' => $validName,
//                'validSurname' => $validSurname,
//                'validAge' => $validAge,
//            ]
//        );
//    }
}