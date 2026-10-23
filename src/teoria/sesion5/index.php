<?php

session_start();

$_SESSION["edad"] = 19;

echo $_SESSION["edad"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INDEX</h1>
    <p>Tu nombre es: <?= $_SESSION["nombre"] ?></p>
    <p>Tu nombre es: <?= $_SESSION["password"] ?></p>
</body>
</html>