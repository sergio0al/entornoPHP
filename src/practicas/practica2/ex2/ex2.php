<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?= "<h1>Exercici 2: Taules de multiplicar</h1>" ?>
    <?php for($i = 1; $i <= 11; $i++):?>
        <div class="tabla">
        <div class="numeroTabla"><?= $i ?></div>
        <?php for($j = 1; $j <= 11; $j++): $res = $i*$j?>
            <div><?= "$i * $j = $res"?></div>
        <?php endfor;?>
        </div>
        <?php endfor;?>
</body>
</html>