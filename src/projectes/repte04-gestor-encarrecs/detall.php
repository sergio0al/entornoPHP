<?php

include("./dades.php")

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a9b5133090.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/style.css">
    <title>Document</title>
</head>
<body>
    <?php
    
    include("./includes/header.php");
    $id = $_GET["id"];

    ?>

    <main>
        <div class="content">
            <a href="index.php"><p><i class="fa-solid fa-left-long"></i> Tornar al gestor</p></a>
            <div id="detallDiv">
                <div id="headerDetall">
                    <small>Detall de l´encàrrec #<?= $id ?></small>
                    <h2><?=$encarrecs[$id]["titol"]?></h2>
                    <p>Projecte encarregat pero <?=$encarrecs[$id]["client"]?></p>
                </div>
                <div id="mainDetall">
                    <div>
                        <h4>CLIENT</h4>
                        <P><?=$encarrecs[$id]["client"]?></P>
                    </div>
                    <div>
                        <h4>HORES ESTIMADES</h4>
                        <P><?=$encarrecs[$id]["hores"]?></P>
                    </div>
                    <div>
                        <h4>ESTAT</h4>
                        <P><?=$encarrecs[$id]["estat"]?></P>
                    </div>
                    <div>
                        <h4>ETIQUETES</h4>
                        <P><?=implode(" · " , $encarrecs[$id]["etiquetes"])?></P>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    
    include("./includes/footer.php")

    ?>
</body>
</html>