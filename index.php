<?php

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    // Si el usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header("Location: login_usuario.html");
    exit();
}

// Obtener el email del usuario de la sesión
$email = $_SESSION['email'];

// Obtener el nombre del usuario de la sesión
$nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página de Inicio</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenido: <?php echo $nombre; ?></h2>
        <p>Tu email es: <?php echo $email; ?></p>
        <a href="logout.php">Cerrar sesión</a>
    </div>
    
</body>
</html>
