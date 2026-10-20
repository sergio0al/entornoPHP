<?php 

include("./dades.php")

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
            <p>Alta de projecte</p>
            <h2>Afeguir un encàrrec</h2>
            <p>Emplena totes les dades. Les etiquetes s´han d´escriure separades per comes.</p>
        </div>
        <form action="index.php" method="post">
            <label for="title">Titol</label>
            <input type="text" id="title" name="titulo">
            <label for="cliente">Client</label>
            <input type="text" id="cliente" name="cliente">
            <div>
                <label for="hores">Hores</label>
                <input type="text" id="hores" names="hores">
                <label for="estat">Estat</label>
                <select name="estat" id="estat">
                    <option value="">Pendent</option>
                    <option value="">En procés</option>
                    <option value="">Acabat</option>
                </select>
            </div>
            <label for="etiquetes">Etiquetes</label>
            <input type="text" id="etiquetes" name="etiquetes">
        </form>
    </section>
</body>
</html>