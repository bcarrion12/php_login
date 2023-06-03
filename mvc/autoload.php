<?php

// Función de autocarga de clases
spl_autoload_register(function ($className) {
    // Definir el directorio base
    $baseDir = __DIR__ . '/app';

    // Reemplazar los caracteres de espacio de nombres con barras diagonales
    $className = str_replace('\\', '/', $className);

    // Crear la ruta del archivo de clase
    $filePath = $baseDir . '/' . $className . '.php';

    // Verificar si el archivo existe y cargarlo
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});
