<?php

spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/..';

    $className = str_replace('\\', '/', $className);
    $filePath = $baseDir . '/' . $className . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        echo "Class $className not found.";
    }
});
