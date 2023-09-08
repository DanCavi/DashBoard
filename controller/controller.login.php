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
    header("Location: ./../signin.php?error=Llene todos los campos");
    exit();
} else {
    $query = "Select * from usuarios where email = '$email' and password = '$passw'";
    $rolQuery = "Select rolName from roles inner join usuariosrole where rolId = id and id = 1";

    $resultado = mysqli_query($conexion, $query);
    $resRol = mysqli_query($conexion, $rolQuery);

    if (mysqli_num_rows($resultado) != 1) {
        header("Location: ./../signin.php?error=Usuario incorrecto");
        exit();
    } else {

        if (isset($_POST['cook'])) {
            session_set_cookie_params(604800);
        }
        
        $columna = mysqli_fetch_assoc($resultado);
        $rolArr = mysqli_fetch_assoc($resRol);
        

        $_SESSION['email'] = $columna['email'];
        $_SESSION['nombre'] = $columna['name'];
        $_SESSION['id'] = $columna['id'];
        $_SESSION['rol'] = $rolArr['rolName'];
        header("Location: ./../index.php");
        exit();

    }

}

}