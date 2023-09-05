<?php

$direcIp = "localhost";
$name = "root";
$pass = "sisep+123";
$db_nombre = "test";

$conexion = mysqli_connect($direcIp, $name, $pass, $db_nombre);

if (!$conexion) {
    echo "Falló";
}
?>