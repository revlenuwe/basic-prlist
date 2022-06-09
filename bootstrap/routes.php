<?php

use App\Controllers\LoginController;
use App\Controllers\ProductsController;
use App\Controllers\RegisterController;
use App\Middlewares\AuthMiddleware;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new Router();

$router->group('api', function ($router) {
    $router->post('/product/{id:number}/edit', [new \App\Controllers\Api\ProductsController(), 'edit'])->middleware(new AuthMiddleware());
    $router->post('/product/add', [new \App\Controllers\Api\ProductsController(), 'add'])->middleware(new AuthMiddleware());

    $router->post('/auth/register', new \App\Controllers\Api\Auth\RegisterController());
    $router->post('/auth/login', new \App\Controllers\Api\Auth\LoginController());
    $router->post('/auth/logout', new \App\Controllers\Api\Auth\LoginController())->middleware(new AuthMiddleware());
});

$router->group('auth', function ($router) {
    $router->map('GET', '/register', [new RegisterController(), 'index']);
    $router->map('GET', '/login', [new LoginController(), 'login']);
    $router->map('GET', '/logout', [new LoginController(), 'logout']);
});

$router->group('product', function ($router) {
    $router->get('/{id:number}/edit', [new ProductsController(), 'edit']);
    $router->get('/add', [new ProductsController(), 'add']);
    $router->get('/{id:number}', [new ProductsController(), 'product']);
})->middleware(new AuthMiddleware());

$router->map('GET', '/', [new ProductsController(), 'index'])->middleware(new AuthMiddleware());


$response = $router->dispatch($request);

(new SapiEmitter())->emit($response);