<?php
//se inclute la conexion con la bd
include "conexion.php";

// Procesar el formulario de registro
if (isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el usuario ya existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "El usuario ya existe <a href='alta_usuario.html'>Volver al formulario de registro</a>";
    } else {
        // Insertar nuevos datos en la base de datos
      $insert_sql = "INSERT INTO usuarios (nombre,apellidos, email, password) VALUES ('$nombre', '$apellidos', '$email', '$password')";
        if ($conn->query($insert_sql) === TRUE) {
           
            // Redireccionar a la página de login después del registro exitoso
            echo "Te has registrado correctamente <a href='login_usuario.html'>Iniciar sesion</a>";

            exit();
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
