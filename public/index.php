<?php

// Start session at the beginning
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use App\Router ;
use App\Controllers\UserController ;
use App\Controllers\ProductController ;

require __DIR__."/../vendor/autoload.php";

$route = new Router();

// Auth routes
$route->addRoute("GET","login",UserController::class,"login");
$route->addRoute("POST","verify",UserController::class,"verify");
$route->addRoute("GET","dashboard",UserController::class,"dashboard");
$route->addRoute("GET","logout",UserController::class,"logout");

// Product routes
$route->addRoute("GET","products",ProductController::class,"index");
$route->addRoute("GET","store_product",ProductController::class,"store");
$route->addRoute("GET","show_product",ProductController::class,"show");
$route->addRoute("GET","delete_product",ProductController::class,"delete");
$route->addRoute("POST","create_product",ProductController::class,"create");
$route->addRoute("POST","update_product",ProductController::class,"update");

// Default redirect to login
$path = $_GET["action"] ?? null;

// If no action is provided, redirect to login
if ($path === null || $path === "index") {
    header("Location: ?action=login");
    exit;
}

$route->dispatch();