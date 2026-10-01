<?php


$numero = rand(2, 100);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Divisors</title>
</head>
<body>
    <h1>Exercici 4 Divisors d'un nombre i verificació de nombre primer</h1>
    <section id="resultat">
        <h2>Nombre generat: <?= $numero ?></h2>
        <h3>Divisors de <?= $numero ?>:</h3>

        <div id="divisors">
            <?php
            $divisors = 0;
            for ($i = 1; $i <= $numero; $i++):
                if ($numero % $i === 0): ?>
                    <p class="divisor"><?= $i ?></p>
                    <?php $divisors++; ?>
            <?php endif;?>
            <?php endfor; ?>
        </div>

        <?php if ($divisors === 2): ?>
            <p id="primer"><?= $numero ?> és un nombre primer.</p>
        <?php else: ?>
            <p id="noPrimer"><?= $numero ?> no és un nombre primer.</p>
        <?php endif; ?>
    </section>
</body>
</html>