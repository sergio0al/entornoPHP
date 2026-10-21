<?php 

include("./dades.php");

if(isset($_GET["titulo"]) && isset($_GET["cliente"])){
    $nou = [
        "titol" => $_GET["titulo"],
        "client" => "FitZone Badalona",
        "hores" => 6,
        "estat" => "En procés",
        "etiquetes" => ["HTML", "CSS", "Responsive"]
    ];

    guardarEncarrec($nou);
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Document</title>
</head>
<body>
    <?php
    include("./includes/header.php")
    ?>

    <section id="gestorSection">
        <div>
            <p>AGÈNCIA WEB · TAULER DE PROJECTES</p>
            <h1>Gestor d´encàrrecs</h1>
            <small>Consultar la feina de l´equip, revisa les hores previstes i registra encàrrecs nous.</small>
        </div>
        <a href="#formularioSection"><button>+ Nou encàrrec</button></a>
    </section>

    <section id="sectionEncarrecs">
        <?php
        foreach($encarrecs as $id => $encarrec):?>
        <div class="cart">
            <div class="estatDiv">
                <p class="estat <?= $encarrec["estat"]?>"><?= $encarrec["estat"]?></p>
                <p><?= $encarrec["hores"]?>h</p>
            </div>
            <h3><?= $encarrec["titol"]?></h3>
            <p>Client: <span class="client"><?= $encarrec["client"]?></span></p>
            <p class="tecnologias"><?= implode(" · ",$encarrec["etiquetes"])?></p>
            <div class="buttonDiv">
                <a href="detall.php?id=<?=$id?>"><button class="veure">Veure detall</button></a>
                <a href="detall.php"><button class="elminar">Eliminar</button></a>
            </div>
        </div>
        <? endforeach ?>
    </section>
    

    <section id="formularioSection">
        <div>
            <small>Alta de projecte</small>
            <h2>Afeguir un encàrrec</h2>
            <p>Emplena totes les dades. Les etiquetes s´han d´escriure separades per comes.</p>
            <div class="alert">
                <p>Les dades no es desen entre peticion, tal como demana el repte.</p>
            </div>
        </div>
        <form action="index.php" method="get">
            <label for="title">Titol <input type="text" id="title" name="titulo" placeholder="Ex: Redisseny d´una botiga"></label>
            <label for="cliente">Client <input type="text" id="cliente" name="cliente" placeholder="Nom del client"></label>
            <label for="hores">Hores <input type="text" id="hores" names="hores"></label>
            <label for="estat">Estat <select name="estat" id="estat">
                <option value="">Pendent</option>
                <option value="">En procés</option>
                <option value="">Acabat</option>
            </select></label>
            <label for="etiquetes">Etiquetes <input type="text" id="etiquetes" name="etiquetes" placeholder="PHP, Docker, Responsive"></label>
            <input type="submit" name="Añadir" id="">
        </form>
    </section>
    <?php print_r($encarrecs) ?>
</body>
</html>