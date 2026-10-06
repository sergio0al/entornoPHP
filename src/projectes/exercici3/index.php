<?php



$conceptes = [
    [
        "icono" => "fa-brands fa-php",
        "tecnologia" => "PHP",
        "titulo" => "Variables",
        "descripcion" => "Serveixen per guardar informació que després podem utilitzar.",
        "imagen" => "variables.png",
        "destacat" => true
    ],
    [
        "icono" => "fa-brands fa-php",
        "tecnologia" => "PHP",
        "titulo" => "If / else",
        "descripcion" => "Permet executar un codi o un altre segons una condició.",
        "imagen" => "ifelse.png",
        "destacat" => true
    ],
    [
        "icono" => "fa-brands fa-js",
        "tecnologia" => "JavaScript",
        "titulo" => "Manipular el DOM",
        "descripcion" => "Permet modificar el contingut de la pàgina des de JavaScript.",
        "imagen" => "manipuladorDOM.png",
        "destacat" => true
    ],
    [
        "icono" => "fa-brands fa-js",
        "tecnologia" => "JavaScript",
        "titulo" => "Array i forEach",
        "descripcion" => "Permet recórrer tots els elements d'un array.",
        "imagen" => "array.png",
        "destacat" => false
    ],
    [
        "icono" => "fa-brands fa-react",
        "tecnologia" => "React",
        "titulo" => "Components",
        "descripcion" => "Permeten dividir la interfície en peces reutilitzables.",
        "imagen" => "components.png",
        "destacat" => true
    ],
    [
        "icono" => "fa-brands fa-html5",
        "tecnologia" => "HTML",
        "titulo" => "Estructura HTML5",
        "descripcion" => "Utilitzem etiquetes semàntiques per organitzar el contingut.",
        "imagen" => "html.png",
        "destacat" => true
    ],
    [
        "icono" => "fa-brands fa-docker",
        "tecnologia" => "Docker",
        "titulo" => "Docker compose",
        "descripcion" => "Permet aixecar diversos serveis alhora (per exemple, una web i una base de dades).",
        "imagen" => "docker.png",
        "destacat" => false
    ],
    [
        "icono" => "fa-solid fa-database",
        "tecnologia" => "BBDD",
        "titulo" => "Consultes SQL bàsiques",
        "descripcion" => "Permeten obtenir informació de la base de dades.",
        "imagen" => "bbdd.png",
        "destacat" => true
    ]
];


$tecnologia = ["PHP", "JavaScript", "React", "HTML", "Docker", "BBDD", "Projectes"];

$contTecnologia = 0;
$contConceptes = 0;
$contPhp = 0;
$contJavaScript = 0;
$contReact = 0;
$contHtml = 0;
$contDocker = 0;
$contBBDD = 0;
$contProjectes = 0;


foreach($conceptes as $c){
    $contConceptes++;
    if($c["tecnologia"] == "PHP"){
        $contPhp++;
    } else if($c["tecnologia"] == "JavaScript"){
        $contJavaScript++;
    } else if($c["tecnologia"] == "React"){
        $contReact++;
    } else if($c["tecnologia"] == "HTML"){
        $contHtml++;
    } else if($c["tecnologia"] == "Docker"){
        $contDocker++;
    } else if($c["tecnologia"] == "BBDD"){
        $contBBDD++;
    }
}


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
            <i class="fa-solid fa-code icono"></i>
            <h1>Chuleta DAW2</h1>   
        </div>
        <nav>
            <p class="select">Inici</p>
            <p>Conceptes</p>
            <p>Resum</p>
        </nav>
    </header>

    <section id="sectionFilter">
        <ul>
            <li id="totes">Totes</li>
            <?php foreach($tecnologia as $t):?>
            <li class="<?=$t?>"><?=$t?></li>
            <?php endforeach ?>
        </ul>   
    </section>

    <section id="sectionCarts">
        <?php foreach($conceptes as $c):?>
        <div class="cart">
            <div class="headerCart <?=$c["tecnologia"]?>">
                <i class="<?=$c["icono"]?> icon"></i>
                <h3><?=$c["tecnologia"]?></h3>
            </div> 
            <div class="curpoCart">
                <h2><?=$c["titulo"]?></h2>
                <p><?=$c["descripcion"]?></p> 
                <img src="images/<?=$c["imagen"]?>">
            </div>
            <div class="footerDiv">
                <i class="<?=$c["icono"]?> <?=$c["tecnologia"]?>"></i>
                <h3><?=$c["tecnologia"]?></h3>
            </div>
        </div>
        <?php endforeach?>
    </section>

    <section id="sectionResum">


        <div id="contadorDiv">
            <div>
                <h2>Resum de concepetes</h2>
                <ul>
                    <li><div class="esfera PHP"></div> PHP<p><?= $contPhp?></p></li>
                    <li><div class="esfera JavaScript"></div> JavaScript<p><?= $contJavaScript?></p></li>
                    <li><div class="esfera React"></div> React<p><?= $contReact?></p></li>
                    <li><div class="esfera HTML"></div> HTML<p><?= $contHtml?></p></li>
                    <li><div class="esfera Docker"></div> Docker<p><?= $contPhp?></p></li>
                    <li><div class="esfera BBDD"></div> BBDD<p><?= $contBBDD?></p></li>
                    <li><div class="esfera Docker"></div> Projectes<p><?= $contConceptes?></p></li>
                </ul>
            </div>
            <div id="totalCont">
                <h3>Total de Conceptes</h3>
                <p><?= $contConceptes?></p>
            </div>
        </div>

        <div id="assignaturasDiv">
            <h2>Assignaturass</h2>
            <div>
                <?php foreach($tecnologia as $t):?>
                <p class="<?=$t?>"><?=$t?></p>
                <?php endforeach?>
            </div>
        </div>
        
        <div id="destacadosDiv">
            <h2>Conceptes destacats</h2>
            <div>
                <ul>
                <?php foreach($conceptes as $c): if($c["destacat"] === true):?>
                <li><i class="fa-solid fa-star icon"></i><?=$c["titulo"]?></li>
                <?php endif?>
                <?php endforeach?>
                </ul>
            </div>
        </div>

    </section>
</body>
</html>