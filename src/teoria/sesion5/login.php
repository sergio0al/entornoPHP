<?php

session_start();


if( $_SERVER[`REQUEST_METHOD`] == 'POST'){
    $_SESSION['nombre']  = $_POST['nombre'];
    $_SESSION["password"] = $_GET["con"];
}else{
    header('Location: registro.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>login</H1>
    <p>Hola, <?= $_SESSION["nombre"]?></p>
    <p>Tu Contraseña es: <?= $_SESSION["password"] ?></p>
</body>
</html>