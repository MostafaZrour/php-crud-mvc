<?php

use App\Router ;
use App\Controllers\UserController ;

require __DIR__."/../vendor/autoload.php";

$route = new Router();

$route->addRoute("GET","index",UserController::class,"index");
$route->addRoute("GET","store",UserController::class,"store");
$route->addRoute("GET","show",UserController::class,"show");
$route->addRoute("GET","delete",UserController::class,"delete");
$route->addRoute("POST","create",UserController::class,"create");
$route->addRoute("POST","update",UserController::class,"update");

$route->dispatch();