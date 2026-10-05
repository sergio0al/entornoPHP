<?php



$conceptes = [
    [
        "icono" => "fa-brands fa-php",
        "tecnologia" => "PHP",
        "titulo" => "Variables",
        "descripcion" => "Serveixen per guardar informació que després podem utilitzar.",
        "imagen" => "variables.png"
    ],
    [
        "icono" => "fa-brands fa-php",
        "tecnologia" => "PHP",
        "titulo" => "If / else",
        "descripcion" => "Permet executar un codi o un altre segons una condició.",
        "imagen" => "ifelse.png"
    ],
    [
        "icono" => "fa-brands fa-js",
        "tecnologia" => "JavaScript",
        "titulo" => "Manipular el DOM",
        "descripcion" => "Permet modificar el contingut de la pàgina des de JavaScript.",
        "imagen" => "manipuladorDOM.png"
    ],
    [
        "icono" => "fa-brands fa-js",
        "tecnologia" => "JavaScript",
        "titulo" => "Array i forEach",
        "descripcion" => "Permet recórrer tots els elements d'un array.",
        "imagen" => "array.png"
    ],
    [
        "icono" => "fa-brands fa-react",
        "tecnologia" => "React",
        "titulo" => "Components",
        "descripcion" => "Permeten dividir la interfície en peces reutilitzables.",
        "imagen" => "components.png"
    ],
    [
        "icono" => "fa-brands fa-html5",
        "tecnologia" => "HTML",
        "titulo" => "Estructura HTML5",
        "descripcion" => "Utilitzem etiquetes semàntiques per organitzar el contingut.",
        "imagen" => "html.png"
    ],
    [
        "icono" => "fa-brands fa-docker",
        "tecnologia" => "Docker",
        "titulo" => "Docker compose",
        "descripcion" => "Permet aixecar diversos serveis alhora (per exemple, una web i una base de dades).",
        "imagen" => "docker.png"
    ],
    [
        "icono" => "fa-solid fa-database",
        "tecnologia" => "BBDD",
        "titulo" => "Consultes SQL bàsiques",
        "descripcion" => "Permeten obtenir informació de la base de dades.",
        "imagen" => "bbdd.png"
    ]
];


$tecnologia = ["PHP", "JavaScript", "React", "HTML", "Docker", "BBDD", "Projectes"]



$contTecnologias = 0;
$contPhp = 0;
$contJavaScript = 0;
$contReact = 0;
$contHtml = 0;
$contDocker = 0;
$contBBDD = 0;


foreach($conceptes as $c){
    if($c == "PHP"){
        $contPhp++,
    }else if($c == "JavaScript"){
        $contJavaScript++;
    }else if($c == "React"){
        $contReact++;
    }else if($c == "HTML"){
        $contHtml++;
    }else if($c == "Docker"){

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

    </section>
</body>
</html>