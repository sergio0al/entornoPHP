<?php

session_start();

include("./data/data.php");

if(!isset($_SESSION["username"])){
    header("Location: login.php");
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
    <a href="logout.php"><button>Cerrar session</button></a>
</body>
</html>