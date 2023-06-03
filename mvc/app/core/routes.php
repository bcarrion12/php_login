<?php

namespace App\Core;

class Router
{
    private $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function handleRequest($requestUri)
    {
        $route = $this->findRoute($requestUri);

        if ($route) {
            $this->callControllerMethod($route);
        } else {
            http_response_code(404);
            header('Location: /error.html');
            exit();
        }
    }

    private function findRoute($requestUri)
    {
        if (array_key_exists($requestUri, $this->routes)) {
            return $this->routes[$requestUri];
        }

        return null;
    }

    private function callControllerMethod($route)
    {
        $parts = explode('@', $route);
        $controllerName = 'App\Controllers\\' . $parts[0];
        $methodName = $parts[1];

        $controller = new $controllerName();
        $controller->$methodName();
    }
}
