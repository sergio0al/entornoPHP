<?php


session_start();

if(!isset($_SESSION["usuarios"])){
    $_SESSION["usuarios"] = [
        ["email" => "admin@fpllefia.com", "username" => "admin", "password" => "1234", "rool" => "admin"]
    ];
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
    <form action="registro.php" method="post">
        <h1>Registrarse</h1>
        <label for="email">Email <input type="email" id="email" name="email" required></label>
        <label for="usuario">Usuario <input type="text" id="usuario" name="usuario" required></label>
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
                Registrarse
            </div>
        </button>
        <a href="iniciar.php">Iniciar Sesion</a>
    </form>
    <script type="module" src="script.js"></script>
</body>
</html>