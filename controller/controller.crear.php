<?php
session_start();
include "./controller.conexion.php";

if (isset($_POST['email']) && isset($_POST['passw'])) {

    function validar($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validar($_POST['email']);
    $passw = validar($_POST['passw']);

    if (empty($email) || empty($passw)) {
        header("Location: ./../crear-usuario.php?error=El mail y contraseña deben completarse");
        exit();
    } else {

        $query = "insert into usuarios (name, rut, email, password) values ('default', '11-1', '$email', '$passw')";
        header("Location: ./../crear-usuario.php?error=$query");
        mysqli_query($query, $conexion);
        //header("Location: ./../crear-usuario.php?");
        exit();






    }


}
