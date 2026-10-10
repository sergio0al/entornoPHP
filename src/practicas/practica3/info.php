<?php

include("pelicules.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a9b5133090.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <header>
        <a href="index.php"><img src="images/ocine_logo.png"></a>
        <nav>
            <ul>
                <li>CARTELERA</li>
                <li>BAR</li>
                <li>FIDELITY<i class="fa-solid fa-angle-down"></i></li>
                <li>SERVICIOS<i class="fa-solid fa-angle-down"></i></li>
                <li>OTROS CINES</li>
            </ul>
        </nav>
    </header>

    <section id="sectionInfo">
        <div id="pasosDiv">
            <ul>
                <li class="selected"><span>1</span> BUTACAS</li>
                <li><span>2</span> ENTRADAS</li>
                <li><span>3</span> BAR</li>
                <li><span>4</span> RESUMEN</li>
                <li><span>5</span> PAGO</li>
            </ul>
        </div>
        <a href="index.php"><button class="volver"><i class="fa-solid fa-arrow-left-long"></i>Volver a la cartelera</button></a>
        <h2><?=$pelicules[$_GET["id"]]["nom"]?></h2>
        <hr>
        <div class="content">
            <div class="multimediaPelicula">
                <img src="<?=$pelicules[$_GET["id"]]["imatge"]?>">
                <a href="<?=$pelicules[$_GET["id"]]["trailer"]?>" target="_blank"><button><i class="fa-solid fa-circle-play"></i>Trailer</button></a>
            </div>
            <div class="infoPelicula">
                <p class="descripcion"><?=$pelicules[$_GET["id"]]["sinopsi"]?></p>
                <ul>
                    <li>Duración: <span><?=$pelicules[$_GET["id"]]["durada"]?>'</span></li>
                    <li>Director: <span><?=$pelicules[$_GET["id"]]["director"]?></span></li>
                    <li>Clasificación: <span><?=$pelicules[$_GET["id"]]["qualificacio"]?></span></li>
                    <li>Actores: <span><?=$pelicules[$_GET["id"]]["repartiment"]?></span></li>
                    <li>Género: <span><?=$pelicules[$_GET["id"]]["genere"]?></span></li>
                </ul>
                <select name="dia" id="dia">
                    <?php foreach($pelicules[$_GET["id"]]["horaris"] as $dia => $horas): ?>
                        <option value="<?=$dia?>"><?=$dia?></option>
                    <? endforeach ?>
                </select>
                <div class="infoHoras">
                    <img src="images/atmos_logo.png" alt="">
                    <?php foreach($pelicules[$_GET["id"]]["horaris"] as $dia => $horas):?>
                        <hr>
                        <?php foreach($horas as $hora):?>
                        <p class="hora"><?=$hora?></p>
                        <? endforeach ?>
                    <? endforeach ?>
                </div>
            </div>
        </div>
    </section>

</body>
</html>