<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["nombre"]) and isset($_POST["contraseña"])){
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["contraseña"] = $_POST["contraseña"];
        header("Location: login.php");
        exit;
    }else{
        header("Location: registro.php");
        exit;
    }
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
    <h1>REGISTRO</h1>
    <form action="registro.php" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="nombre" id="name" required>
        <label for="password">Contraseña</label>
        <input type="text" name="contraseña" id="password" required>
        <input type="submit" name="" id="">
    </form>
</body>
</html>