<?php

session_start();

$error = "Bienvenido el gestor de reciclaje";
$camion = 0;
$tipos = [["tipo" => "plastico", "imagen" => "amarillo.png"], ["tipo" => "vidrio", "imagen" => "verde.png"], ["tipo" => "organico", "imagen" => "rojo.png"], ["tipo" => "carton", "imagen" => "azul.png"]];
$cola = [["tipo" => "plastico", "imagen" => "amarillo.png"], ["tipo" => "vidrio", "imagen" => "verde.png"], ["tipo" => "organico", "imagen" => "rojo.png"], ["tipo" => "carton", "imagen" => "azul.png"]];

$contadores = ["plastico" => 0, "vidrio" => 0, "organico" => 0, "carton" => 0];
$tope = ["plastico" => 7, "vidrio" => 7, "organico" => 7, "carton" => 7];



if(!isset($_SESSION["cola"]) || !isset($_SESSION["contadores"])){
    $_SESSION["cola"] = $cola;
    $_SESSION["contadores"] = $contadores;
    $_SESSION["cammion"] = $camion;
}


if(isset($_GET["envio"])){
    $ultimo = array_shift($_SESSION["cola"]);
    array_push($_SESSION["cola"], $tipos[array_rand($tipos)]);
    if($ultimo["tipo"] == $_GET["envio"]){
        if($_SESSION["contadores"][$_GET["envio"]] < $tope[$_GET["envio"]]){
            $_SESSION["contadores"][$_GET["envio"]] += 1;
            $_SESSION["cammion"] += 1;
            $error = "Bien";
        }else{
            $error = "La cantidad de contenedores de este tipo esta lleno.";
        }
    }else{
        $error = "El contenedor no pertenece a ese tipo.";
    }
}



if(isset($_GET["vaciar"])){
    unset($_SESSION["cammion"]);
    $_SESSION["cammion"] = $camion;
    unset($_SESSION["contadores"]);
    $_SESSION["contadores"] = $contadores;
}




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
        <a href="logout.php" id="cerrar">LIMPIAR SESSION</a>
        <h1>PP Extra Repas Sessiones</h1>
    </header>
    <main>
        <?php if($error != ""):?><p id="error"><?=$error?></p><?php endif ?>
        <p id="contCamion">En el camion <?=$_SESSION["cammion"]?></p>
        <div id="cuerpo">
            <div id="listaContenedores">
                <?php foreach($_SESSION["cola"] as $pos):?>
                    <div class="contenedor">
                        <img src="./images/<?=$pos["imagen"]?>" alt="">
                        <p><?=$pos["tipo"]?></p>
                    </div>
                <?php endforeach ?>
            </div>

            <div id="listaTipos">
                <a href="index.php?envio=plastico" id="plasticoBtn">Plastico</a>
                <a href="index.php?envio=vidrio" id="vidrioBtn">Vidrio</a>
                <a href="index.php?envio=organico" id="organicoBtn">Organico</a>
                <a href="index.php?envio=carton" id="cartonBtn">Carton</a>
                <a href="index.php?vaciar">Vaciar Camion</a>
            </div>
        </div>
        <div id="listado">
            <p>Plastico: <?=$_SESSION["contadores"]["plastico"]?>/7</p>
            <p>Vidrio: <?=$_SESSION["contadores"]["vidrio"]?>/7</p>
            <p>Organico: <?=$_SESSION["contadores"]["organico"]?>/7</p>
            <p>Carton: <?=$_SESSION["contadores"]["carton"]?>/7</p>
        </div>
    </main>
    <footer>
        <p>Sergio Alonso</p>
    </footer>
</body>
</html>