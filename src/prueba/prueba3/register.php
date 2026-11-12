<?php

session_start();
include("./data/data.php");
$mensaje = "";
$existe = false;

if(!isset($_SESSION["usuarios"])){
    $_SESSION["usuarios"] = $usuarios;
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    foreach($_SESSION["usuarios"] as $usu){
        if($usu["email"] === $_POST["username"]){
            $existe = true;
        }
    }

    if(!$existe){
        $nou = [
            "id" => count($_SESSION["usuarios"]),
            "email" => $_POST["username"],
            "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
            "rol" => "user",
        ];
        array_push($_SESSION["usuarios"], $nou);
        header("Location: index.php");
        exit;
    }else{
        $mensaje = "El nombre de usuario ya existe!";
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
    <h1>Registro</h1>
    <form action="register.php" method="POST">
        <label for="username">Usuario<input type="text" id="username" name="username" focus required></label>
        <label for="password">Password<input type="text" id="password" name="password" required></label>
        <button>Registrarse</button>
    </form>
    <a href="index.php">Iniciar Session</a>
    <p><?=$mensaje?></p>
</body>
</html>