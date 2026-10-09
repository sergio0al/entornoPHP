<?php

include("pelicules.php");

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


    <section id="sectionInfo">
        <h2><?=$pelicules[$_GET["id"]]["nom"]?></h2>
        <hr>
        <div class="content">
            <div class="multimediaPelicula">
                <img src="<?=$pelicules[$_GET["id"]]["imatge"]?>">
                <a href="<?=$pelicules[$_GET["id"]]["trailer"]?>" target="_blank"><button>Trailer</button></a>
            </div>
            <div class="infoPelicula">
                <p class="descripcion"><?=$pelicules[$_GET["id"]]["sinopsi"]?></p>
                <ul>
                    <li>Duración: <span><?=$pelicules[$_GET["id"]]["durada"]?>'</span></li>
                    <li>Director: <span>Yukiyo Teramoto</span></li>
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
                    <img src="images/atmos-logo.png" alt="">
                </div>
            </div>
        </div>
    </section>

</body>
</html>