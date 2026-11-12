<?php

session_start();

include("./data/data.php");

for ($i = 1; $i <= 20; $i++) {
    $clase = ($i % 4 == 0) ? 'caja destacada' : 'caja';
    echo "<div class='$clase'>caixa $i</div>";
}


if(!isset($_SESSION["usuarios"])){
    $_SESSION["usuarios"] = $usuarios;
}


if($_SERVER["REQUEST_METHOD"] === "POST"){
    foreach($_SESSION["usuarios"] as $usu){
        if($usu["usuario"] === $_POST["name"] and password_verify($_POST["password"], $usu["password"])){
            $_SESSION["username"] = $_POST["name"];
            header("Location: index.php");
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
    <form action="login.php" method="post">
        <label for="name">Nombre<input type="text" name="name" id="name"></label>
        <label for="password">Password<input type="text" name="password" id="password"></label>
        <input type="submit" value="login">
    </form>
</body>
</html>