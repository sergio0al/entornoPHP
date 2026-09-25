<?php 

$nombreValencia = "Valencia C. F.";
$escudoValencia = "//ssl.gstatic.com/onebox/media/sports/logos/optimized/QPbjvDwI_0Wuu4tCS2O6uw_48x48.png";

$nombreBarcelona = "Barcelona";
$escudoBarcelona = "//ssl.gstatic.com/onebox/media/sports/logos/optimized/paYnEE8hcrP96neHRNofhQ_48x48.png";

$resultadoValencia = "0";
$resultadoBarcelona = "5";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
    <section>
        <h1 id="title"><?= $nombreValencia ?> contra <?= $nombreBarcelona ?></h1>    
        
        <div id="partidosContainer">
            <div class="partido">
                <div class="info">
                    <div class="equipos">
                        <img src="<?= $escudoValencia ?>">
                        <p><?= $nombreValencia ?></p>

                        <img src="<?= $escudoBarcelona ?>">
                        <p class="ganador"><?= $nombreBarcelona ?></p>
                    </div>
                    <div class="resultados">
                        <p><?= $resultadoValencia ?></p>
                        <p class="ganador"><?= $resultadoBarcelona ?></p>
                    </div>
                </div>
            </div>

            

            <div class="partido">
                <div class="info">
                    <div class="equipos">
                        <img src="<?= $escudoValencia ?>">
                        <p><?= $nombreValencia ?></p>

                        <img src="<?= $escudoBarcelona ?>">
                        <p class="ganador"><?= $nombreBarcelona ?></p>
                    </div>
                    <div class="resultados">
                        <p><?= $resultadoValencia ?></p>
                        <p class="ganador"><?= $resultadoBarcelona ?></p>
                    </div>
                </div>
            </div>

      
            <div class="partido">
                <div class="info">
                    <div class="equipos">
                        <img src="<?= $escudoBarcelona ?>">
                        <p><?= $nombreBarcelona ?></p>

                        <img src="<?= $escudoValencia ?>">
                        <p><?= $nombreValencia ?></p>
                    </div>
                    <div class="resultados">
                        <p></p>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="partido"></div>
        </div>

        <div class="footer">
            <p>Horarios en Hora de Verano de Europa Central</p>
            <p>Sugerencias</p>
        </div>

    </section>

</body>
</html>