<?php

// Conexión a la base de datos
// Cambia el valor de las variables segun la configuracion de tu sgbd
$servername = "localhost";
$username = "remoto";
$password = "Passw0rd";
$dbname = "login_test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>
