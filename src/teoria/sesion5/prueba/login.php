<?php

session_start();

if(isset($_SESSION["contraseña"])){
    $encrip = password_hash($_SESSION["contraseña"], PASSWORD_DEFAULT);
}else{
    header("Location: registro.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["nombre"]) and isset($_POST["contraseña"])){
        if($_POST["nombre"] === $_SESSION["nombre"] and password_verify($_POST["contraseña"], $encrip)){
            header("Location: home.php");
            unset($_SESSION["contraseña"]);
            echo "correcto";
            exit;
        }
        else{
            echo "user o password equivocado";
        }
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
    <h1>LOGIN</h1>
    <form action="login.php" method="post">
        <form action="registro.php" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="nombre" id="name" required>
        <label for="password">Contraseña</label>
        <input type="text" name="contraseña" id="password" required>
        <input type="submit" name="" id="">
    </form>
</body>
</html>