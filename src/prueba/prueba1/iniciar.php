<?php

session_start();

if(!isset($_SESSION["usuarios"])){
    header("Location: registro.php");
    exit;
}


if($_SERVER["REQUEST_METHOD"] === "POST"){
    foreach($_SESSION["usuarios"] as $usuario){
        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";
        if($usuario["email"] === $email and $usuario["password"] === $password){
            header("Location: index.php");
            exit;
        }else{
            $error = "derwdD";
        }
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a9b5133090.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="iniciar.php" method="post">
        <h1>Iniciar Sesion</h1>
        <label for="email">Email <input type="email" id="email" name="email" required></label>
        <label for="password">Contraseña <input type="password" id="password" name="password" required><div class="conjunto">
            <div class="flechas">
                <i class="fa-solid fa-eye-slash icon"></i>
                <i class="fa-solid fa-eye icon"></i>
            </div>            
        </div></label>
        <label for="politicas"><input type="checkbox" id="politicas" required>He leido las Politicas de privacidad</label>
        <button>
            <div class="filtro"></div>
            <div class="texto">
                Iniciar Sesion
            </div>
        </button>
        <a href="registro.php">Registrarse</a>
    </form>
    <script type="module" src="script.js"></script>
</body>
</html>