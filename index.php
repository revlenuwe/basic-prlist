<?php
session_start();

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;

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

require_once "bootstrap/routes.php";