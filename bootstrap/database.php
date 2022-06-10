<?php

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;

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