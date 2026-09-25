<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
     <?= "<h1>Exercici 1: Nombres parells entre 50 i 500</h1>" ?>
    <main>
    <?php 
    for($i = 50; $i <= 500; $i++):
    if(($i % 2) == 0):?>
    <div><?= $i ?></div>
    <?php endif?>
    <?php endfor?>
    <main>
</body>
</html>