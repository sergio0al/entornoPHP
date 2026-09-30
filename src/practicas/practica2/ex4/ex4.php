<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>  
    <h1>Classificació de Temperatures</h1>
    <section>
        <?php $sumaTemp = 0; for($i = 0; $i<10; $i++): $temp = rand(-5, 30); $sumaTemp += $temp?>
        <div class="<?php if($temp < 10):?> fred<?php elseif($temp >= 10 && $temp <= 25):?> suau<?php else:?>calor<?php endif ?>">
            <p class="temperatura"><?= $temp?></p>
            <p><?php if($temp < 10):?>Fred<?php elseif($temp >= 10 && $temp <= 25):?>Temperatura suau<?php else:?>Calor<?php endif ?></p>
        </div>
        <? endfor; ?>
    </section>
    <section>
        <h2>Mitjana de les temperatures <?= $sumaTemp/10 ?></h2>
    </section>
</body>
</html>