<?php

use App\Controllers\ProductsController;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;

require_once "vendor/autoload.php";

$capsule = new Manager();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => '',
    'username' => '',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);


$capsule->setEventDispatcher(new Dispatcher(new Container()));

$capsule->setAsGlobal();

$capsule->bootEloquent();



$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new Router();

$router->map('GET', '/product/{id:number}/edit', [new ProductsController(), 'edit']);
$router->map('GET', '/product/{id:number}', [new ProductsController(), 'product']);
$router->map('GET', '/', [new ProductsController(), 'index']);



$response = $router->dispatch($request);

(new SapiEmitter())->emit($response);