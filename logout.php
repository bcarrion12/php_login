<?php
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al formulario de inicio de sesión después de cerrar sesión
header("Location: login_usuario.html");
exit();
?>
