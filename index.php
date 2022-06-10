<?php
session_start();

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;

require_once "vendor/autoload.php";

require_once "bootstrap/database.php";

require_once "bootstrap/routes.php";