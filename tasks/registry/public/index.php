<?php

require '../vendor/autoload.php';

use App\Controllers\DeleteChangeController;
use App\Controllers\LogoutController;
use App\Controllers\RegistryController;
use App\Controllers\LoginController;
use App\Repositories\Persons\MYSQLPersonsRepository;
use App\Repositories\Persons\PersonsRepository;
use App\Repositories\Tokens\MYSQLTokensRepository;
use App\Repositories\Tokens\TokensRepository;
use App\Services\DeleteChangePersonService;
use App\Services\LoginPersonService;
use App\Services\StorePersonService;
use App\Services\TokenService;

session_start();

$container = new League\Container\Container;

$container->add(LogoutController::class);

$container->add(LoginPersonService::class, LoginPersonService::class)
    ->addArgument(PersonsRepository::class);

$container->add(TokenService::class, TokenService::class)
    ->addArgument(TokensRepository::class);

$container->add(LoginController::class, LoginController::class)
    ->addArgument(LoginPersonService::class)
    ->addArgument(TokenService::class);

$container->add(DeleteChangeController::class, DeleteChangeController::class)
    ->addArgument(DeleteChangePersonService::class);

$container->add(DeleteChangePersonService::class, DeleteChangePersonService::class)
    ->addArgument(PersonsRepository::class);

$container->add(RegistryController::class, RegistryController::class)
    ->addArgument(StorePersonService::class)
    ->addArgument(TokenService::class);

$container->add(StorePersonService::class, StorePersonService::class)
    ->addArgument(PersonsRepository::class);

$container->add(PersonsRepository::class, MYSQLPersonsRepository::class);

$container->add(TokensRepository::class, MYSQLTokensRepository::class);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute(['GET'], '/', [RegistryController::class, 'index']);
    $r->addRoute(['GET'], '/login', [LoginController::class, 'index']);
    $r->addRoute(['GET'], '/logout', [LogoutController::class, 'logout']);
    $r->addRoute(['GET'], '/auth', [LoginController::class, 'executeLogin']);
    $r->addRoute(['POST'], '/', [LoginController::class, 'login']);
    $r->addRoute(['POST'], '/search', [RegistryController::class, 'search']);
    $r->addRoute(['POST'], '/delete', [DeleteChangeController::class, 'delete']);
    $r->addRoute(['POST'], '/change', [DeleteChangeController::class, 'change']);
    $r->addRoute(['POST'], '/store', [RegistryController::class, 'store']);
});

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
        echo $container->get($controller)->$method($vars);
        break;
}

if($httpMethod == 'GET' &&  isset($_SESSION['_message'])){
    unset($_SESSION['_message']);
}

