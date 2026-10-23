<?php

session_start();

if(!isset($_SESSION["nombre"])){
    header("Location: login.php");
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
    <h1>Home</h1>
    <p>Hola <?= $_SESSION["nombre"] ?></p>
    <a href="logout.php">CERRAR SESION</a>
</body>
</html>