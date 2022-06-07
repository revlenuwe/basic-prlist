<?php

use App\Controllers\ProductsController;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;
use Psr\Http\Message\ServerRequestInterface;

require_once "vendor/autoload.php";

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new Router();

$router->map('GET', '/', [new ProductsController(), 'index']);


$response = $router->dispatch($request);

(new SapiEmitter())->emit($response);