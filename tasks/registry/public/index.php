<?php

require '../vendor/autoload.php';

use App\Controllers\DeleteChangeController;
use App\Controllers\HomeController;
use App\Repositories\Persons\MYSQLPersonsRepository;
use App\Repositories\Persons\PersonsRepository;
use App\Services\DeleteChangePersonService;
use App\Services\StorePersonService;

$container = new League\Container\Container;

$container->add(DeleteChangeController::class, DeleteChangeController::class)
    ->addArgument(DeleteChangePersonService::class);

$container->add(DeleteChangePersonService::class, DeleteChangePersonService::class)
    ->addArgument(PersonsRepository::class);

$container->add(HomeController::class, HomeController::class)
    ->addArgument(StorePersonService::class);

$container->add(StorePersonService::class, StorePersonService::class)
    ->addArgument(PersonsRepository::class);

$container->add(PersonsRepository::class, MYSQLPersonsRepository::class);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute(['GET'], '/', [HomeController::class, 'index']);
    $r->addRoute(['POST'], '/search', [HomeController::class, 'search']);
    $r->addRoute(['POST'], '/delete', [DeleteChangeController::class, 'delete']);
    $r->addRoute(['POST'], '/change', [DeleteChangeController::class, 'change']);
    $r->addRoute(['POST'], '/store', [HomeController::class, 'store']);

//    $r->addRoute(['GET', 'POST'], '/update', [UpdateController::class,'index']);
//    // The /{title} suffix is optional
//    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

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
        $container->get($controller)->$method($vars);
        break;
}



