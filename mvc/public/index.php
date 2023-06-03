<?php

require_once '../vendor/autoload.php';
require_once '../app/autoload.php';

use App\Core\Router;

$routes = require_once '../app/routes.php';

$requestUri = $_SERVER['REQUEST_URI'];
$router = new Router($routes);
$router->handleRequest($requestUri);
