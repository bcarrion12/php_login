<?php

// Cargar el archivo de autoload
require_once 'autoload.php';

// Obtener la ruta de la solicitud
$requestUri = $_SERVER['REQUEST_URI'];

// Eliminar cualquier consulta de la URL
$requestUri = explode('?', $requestUri)[0];

// Definir las rutas disponibles
$routes = [
    '/' => 'HomeController@index',
    '/users' => 'UserController@index',
    '/users/create' => 'UserController@create',
    '/users/store' => 'UserController@store',
    '/users/{id}/edit' => 'UserController@edit',
    '/users/{id}/update' => 'UserController@update',
    '/users/{id}/delete' => 'UserController@delete',
];

// Comprobar si la ruta existe
if (array_key_exists($requestUri, $routes)) {
    // Obtener el controlador y el método asociado
    $routeParts = explode('@', $routes[$requestUri]);
    $controllerName = $routeParts[0];
    $methodName = $routeParts[1];

    // Crear una instancia del controlador y llamar al método
    $controller = new $controllerName();
    $controller->$methodName();
} else {

    header('Location: /error.php');
}
