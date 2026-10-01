<?php 

$projectes1 = ["Landing per a clínica dental", "Web", 7, 6, "fa-solid fa-tooth", "Alta"];
$projectes2 = ["Catàleg de productes artesans", "Ecommerce", 5, 4, "fa-solid fa-cart-shopping", "Mitja"];
$projectes3 = ["Blog corporatiu escola", "CMS", 2, 3, "fa-regular fa-file-lines", "Bixa"];
$projectes4 = ["Auditoria responsive", "Qualitat", 8, 5, "fa-solid fa-book", "Alta"];
$projectes5 = ["Fitxa de servei amb CTA", "Web", 4, 2, "fa-solid fa-bullhorn", "Mitja"];
$projectes6 = ["Galeria de projectes", "CMS", 3, 4, "fa-solid fa-image", "Bixa", "Mitja"];
$projectes7 = ["Botiga online bàsica", "Ecommerce", 9, 8, "fa-solid fa-gear", "Alta"];
$projectes8 = ["Optimització d'imatges", "Qualitat", 6, 3, "fa-solid fa-bag-shopping", "Bixa"];

$projectesJuntos = [$projectes1, $projectes2, $projectes3, $projectes4, $projectes5, $projectes6, $projectes7, $projectes8];

$tecnologies = ["HTML", "CSS", "PHP", "Docker", "WordPress", "Shopify"]


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
        <div>
            <i id="logo" class="fa-solid fa-layer-group"></i>
            <h1>Panell intern de projectes</h1>
        </div>
        <nav>
            <button id="inici" class="select"><i class="fa-solid fa-house"></i> Inici</button>
            <button id="inici"><i class="fa-solid fa-bars"></i> Projectes</button>
            <button id="inici"><i class="fa-solid fa-layer-group"></i> Tenconolgies</button>
            <button id="inici"><i class="fa-solid fa-info"></i> Sobre</button>
        </nav>
    </header>



    <main>
        
        <section id="sectionContador">
            <?php
            
            $projectesCont = 0;
            $prioritatAltaCont = 0;
            $horasCont = 0;
            $webCont = 0;
            $tecnologiesCont = 0;

            foreach($projectesJuntos as $projecte){
                $projectesCont++;
                $horasCont += $projecte[3];
                if($projecte[5] === "Alta"){
                    $prioritatAltaCont++;
                }
                if($projecte[1] === "Web"){
                    $webCont++;
                }
            }

            foreach($tecnologies as $tecnologia){
                $tecnologiesCont++;
            }

            ?>

            <div id="projectesCont" class="cart">
                <i class="fa-regular fa-folder-open icon"></i>
                <div>
                    <h4><?= $projectesCont ?></h4>
                    <p>Projectes</p>
                </div>
            </div>
            <div id="altaCont" class="cart">
                <i class="fa-solid fa-triangle-exclamation icon"></i>
                <div>
                    <h4><?= $prioritatAltaCont ?></h4>
                    <p>Prioritat alta</p>
                </div>
            </div>
            <div id="horesCont" class="cart">
                <i class="fa-regular fa-clock icon"></i>
                <div>
                    <h4><?= $horasCont ?></h4>
                    <p>Hores</p>
                </div>
            </div>
            <div id="teconlogiesCont" class="cart">
                <i class="fa-solid fa-code icon"></i>
                <div>
                    <h4><?= $tecnologiesCont ?></h4>
                    <p>Tecnologies</p>
                </div>
            </div>
            
        </section>


        <section id="projectesSection">
            <div id="info">
                <h2>Projectes actius</h2>
                <p>Llista de projectes del curs. Cada targeta mostra la informació principal i las seva prioritat.</p>
            </div>
            <?php
            $id = 0;
            foreach($projectesJuntos as $projecte):
            $id++;?>
            <div class="projecte">
                <div>
                    <p class="id">#<?= $id ?></p>
                    <p class="nom"><?= $projecte[0] ?></p>
                    <p class="prioritat <?=$projecte[5]?>"><?=$projecte[5]?></p>
                </div>
                <div>
                    <i class="<?= $projecte[4] ?> icon"></i>
                    <p>Tipus: <?= $projecte[1] ?></p>
                </div>
                <div>
                    <p><i class="fa-solid fa-clock"></i> <?=$projecte[3]?>h</p>
                    <p><i class="fa-solid fa-signal <?= $projecte[5] ?>"></i> Prioritat <?= $projecte[2] ?>/10<p>
                </div>
            </div>
            <?php endforeach;?>
        </section>
    </main>




    <footer>
        <section id="resumenProjectos">
            <h3>Resum automàtic</h3>
            <div class="contentResum">
                <div class="cont">
                    <i class="fa-regular fa-folder-open icon"></i>
                    <div>
                        <h4><?= $projectesCont ?></h4>
                        <p>Projectes total</p>
                    </div>
                </div>
                <div class="cont">
                    <i class="fa-solid fa-triangle-exclamation icon"></i>
                    <div>
                        <h4><?= $prioritatAltaCont ?></h4>
                        <p>Prioritat alta</p>
                    </div>
                </div>
                <div class="cont">
                    <i class="fa-regular fa-clock icon"></i>
                    <div>
                        <h4><?= $horasCont ?> h</h4>
                        <p>Hores totals</p>
                    </div>
                </div>
                <div class="cont">
                    <i class="fa-solid fa-globe icon"></i>
                    <div>
                        <h4><?= $webCont ?></h4>
                        <p>Projectes web</p>
                    </div>
                </div>
            </div>
        </section>

        
        <section id="tecnologies">
            <h3>Tecnologies</h3>
            <div class="lista">
                <?php 
                
                foreach($tecnologies as $tecnologia):?>
                <p id="<?=$tecnologia?>" class="etiqueta"><?=$tecnologia?></p>
                <?php endforeach?>
            </div>
        </section>
    </footer>



</body>
</html>