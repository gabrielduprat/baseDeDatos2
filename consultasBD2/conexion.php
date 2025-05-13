<?php
$SERVER = 'localhost';
$user_name = 'root';
$pass = '';
//$base = "bd2-luque-luque-velozo";
$base = "bases_de_datos_2";

// Conexión a la base de datos
$con = new mysqli($SERVER, $user_name, $pass, $base);

// Verificar si hay conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

?>