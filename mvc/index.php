<?php

// index.php

require_once 'autoload.php';

// Cargar las rutas
$routes = require_once 'routes.php';

// Obtener la ruta de la solicitud
$requestUri = $_SERVER['REQUEST_URI'];

// Eliminar cualquier consulta de la URL
$requestUri = explode('?', $requestUri)[0];

// Verificar si la ruta es una cadena vacía (ruta por defecto)
if ($requestUri === '') {
    $defaultRoute = $routes[''];
    $controllerName = 'App\Controllers\\' . $defaultRoute[0];
    $methodName = $defaultRoute[1];

    // Crear una instancia del controlador por defecto y llamar al método
    $controller = new $controllerName();
    $controller->$methodName();
    exit();
}

// Verificar si la ruta existe en las definiciones de rutas
if (array_key_exists($requestUri, $routes)) {
    // Obtener el controlador y método asociados a la ruta
    $route = $routes[$requestUri];
    $controllerName = 'App\Controllers\\' . $route[0];
    $methodName = $route[1];

    // Crear una instancia del controlador y llamar al método
    $controller = new $controllerName();
    $controller->$methodName();
} else {
    // Ruta no encontrada - Redirigir a la página de error
    header('Location: /error.html');
    exit();
}
?>
