<?php
//se inclute la conexion con la bd
include "conexion.php";
session_start();

// Procesar el formulario de inicio de sesión
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar las credenciales del usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // Obtener los datos adicionales del usuario de la base de datos
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $apellidos = $row['apellidos'];

        // Almacenar los datos del usuario en la sesión
        $_SESSION['email'] = $email;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellidos'] = $apellidos;


        // Redireccionar a la página de inicio después del inicio de sesión exitoso
        header("Location: index.php");
        exit();
    } else {

        echo "Credenciales inválidas <a href='login_usuario.html'>Volver al login</a>";

    }
}

$conn->close();
?>


