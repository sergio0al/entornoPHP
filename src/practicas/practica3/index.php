<?php 


    include("pelicules.php")

    

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
        <img src="images/ocine_logo.png">
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

    <section id="bannerSection">
        <img src="images/banner-dune-preestreno-ocine.jpg" alt="">
    </section>

    <section id="carteleraSection">
        <div>
            <h1>Carteleras OCINE MÀGIC</h1>    
        </div>
        <hr>
        <div class="filtrosDiv">
            <ul>
                <li id="selected">CARTELERA</li>
                <li><img src="images/filtros/infinity_vision.png" alt="Infinity Vision"></li>
                <li><img src="images/filtros/kids.png" alt="Sala Kids"></li>
                <li>CATALÀ</li>
                <li>V.O.S.E.</li>
                <li><img src="images/filtros/dolby_atmos.png" alt="Dsolby Atmos"></li>
                <li><img src="images/filtros/screenX.png" alt="SCREENX"></li>
                <li class="ventas">VENTA ANTICIPADA</li>
                <li class="ventas">PRÓXIMOS ESTRENOS</li>
            </ul>
            <div>
                <i class="fa-solid fa-masks-theater icon"></i>
                <select>
                <?php foreach($generos as $id => $genero):?>
                    <option value="<?=$id?>"><?=$genero?></option>
                <? endforeach ?>
                </select>
            </div>
        </div>
        <div class="cartasDiv">
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
        </div>


    </section>
</body>
</html>