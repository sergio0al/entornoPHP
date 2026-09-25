<?php

$numero = rand(1, 100);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?= "<h1>Exercici 3: Nombre aleatori parell o senar</h1>"?>
    <?php if(($numero % 2) == 0):?>
    <div class="par"><h3>Par</h3><p><?= $numero ?><p></div>
    <?php else:?>
    <div class="impar"><h3>Impar</h3><p><?= $numero ?><p></div>
    <?php endif;?>
</body>
</html>