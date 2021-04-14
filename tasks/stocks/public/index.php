<?php

require '../vendor/autoload.php';

use App\Controllers\BuyController;
use App\Controllers\HomeController;
use App\Models\StocksCollection;
use App\Repositories\FinnhubStocks\FinnhubStocksRepository;
use App\Repositories\FinnhubStocks\QuoteStocksRepository;
use App\Repositories\Stocks\MYSQLStocksRepository;
use App\Repositories\Stocks\StocksRepository;
use App\Repositories\Wallet\MySQLWalletRepository;
use App\Repositories\Wallet\WalletRepository;
use App\Services\QuoteStockService;
use App\Services\StoreMoneyService;
use App\Services\StoreStockService;

session_start();

$container = new League\Container\Container;

$container->add(BuyController::class, BuyController::class)
    ->addArguments([
        QuoteStockService::class,
        StoreStockService::class,
        StoreMoneyService::class]);

$container->add(QuoteStockService::class, QuoteStockService::class)
    ->addArgument(QuoteStocksRepository::class);

$container->add(StoreMoneyService::class, StoreMoneyService::class)
    ->addArgument(WalletRepository::class);

$container->add(HomeController::class, HomeController::class)
    ->addArguments([
        StoreStockService::class,
        StoreMoneyService::class
    ]);

$container->add(StoreStockService::class, StoreStockService::class)
    ->addArguments([
        StocksRepository::class,
        QuoteStockService::class
        ]);

$container->add(QuoteStocksRepository::class, FinnhubStocksRepository::class);

$container->add(StocksRepository::class, MYSQLStocksRepository::class);

$container->add(WalletRepository::class, MySQLWalletRepository::class);


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute(['GET'], '/', [HomeController::class, 'index']);
    $r->addRoute(['POST'], '/display', [HomeController::class, 'display']);
    $r->addRoute(['POST'], '/', [BuyController::class, 'buy']);
    $r->addRoute(['POST'], '/store', [HomeController::class, 'store']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

var_dump($_SESSION);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$controller, $method] = $handler;
        echo $container->get($controller)->$method($vars);
        break;
}

if ($httpMethod == 'GET' && isset($_SESSION['_message'])) {
    unset($_SESSION['_message']);
}
