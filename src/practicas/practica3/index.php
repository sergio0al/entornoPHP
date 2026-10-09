<?php 


    include("pelicules.php")

    

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
    <header>
        <img src="images/ocine_logo.png">
    </header>


    <section id="carteleraSection">


        <?php foreach($pelicules as $id => $pelicula):?>
        <article class="cart">
            <div class="img_Portada">
                <img src='<?=$pelicula["imatge"]?>'>
            </div>
            <div class="info">
                <h2><?=$pelicula["nom"]?></h2>
                <button class="horarisBtn">Ver Horarios</button>
                <p class="clasificacionText">Clasificación: <span class="clasificacion"><?=$pelicula["qualificacio"]?> años</span></p>
                <p class="genero"><?=$pelicula["genere"]?></p>
                <div>
                    <button>Trailer</button>
                    <a href="info.php?id=<?=$id?>"><button>Info</button></a>
                </div>
            </div>
        </article>
        <? endforeach; ?>


    </section>
</body>
</html>