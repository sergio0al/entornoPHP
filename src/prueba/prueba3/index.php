<?php

session_start();

include("./data/data.php");
if(!isset($_SESSION["usuarios"])){
    $_SESSION["usuarios"] = $usuarios;
}

$mensaje = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    foreach($_SESSION["usuarios"] as $usu){
        if($usu["email"] === $_POST["username"] and password_verify($_POST["password"], $usu["password"])){
            $_SESSION["username"] = $_POST["username"];
            header("Location: home.php");
            exit;
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
    <h1>Entrar</h1>
    <form action="index.php" method="POST">
        <label for="username">Usuario<input type="text" name="username" id="username" required focus></label>
        <label for="password">Password<input type="text" name="password" id="password" required></label>
        <button>Entrar</button>
    </form>
    <a href="register.php">Registrarse</a>
</body>
</html>