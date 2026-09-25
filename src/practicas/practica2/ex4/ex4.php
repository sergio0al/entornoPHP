<?php

$numero = rand(1, 100)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= "Nombre generat $numero" ?>   
    <?= "<small>Divisor de $numero</small>"?>   
    <?php for($i = 1; $i <= $numero; $i += 2): ?>
    <?php endfor; ?>
</body>
</html>