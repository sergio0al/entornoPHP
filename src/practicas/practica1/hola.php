<?php 

$logo = "https://www.fpllefia.com/images/logollefia_blanco.png";
$modulo = "MOP31";
$practica = "Pp01 1. Primers passos a PHP";
$foto = "https://lh3.googleusercontent.com/a/ACg8ocJu9I8EhywfuHxQeVFhCpA5JQmC7XiDLk6Oi_8eueggmNA91ak=s288-c-no";
$nombre = "Sergio Alonso Rojals";
$descripcion = "Hola me llamo Sergio y ahora mismo me encuentro estudiando DAW2, vengo con ganas de empezar y poder experimentar lo que estudio dentro de una empresa. En este año, además de acabar el ciclo,mi meta es aprender bien en el proceso para poder salir bien formado. Me gusta trabajar en equipo para poder echar un cable a mis compañeros y por supuesto que me lo echen a mi.";
$fecha = date("d-m-y");

function miNombre(){
    return("Sergio Alonso Rojals");
};

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sergio Alonso</title>
</head>
<body>
    <header>
        <img src="<?= $logo ?>">
        <h1><?= $modulo ?> <?= $practica ?></h1>
    </header>   
    <main>
        <div id="col1">
            <div id="imgContainer">
                <img src="<?= $foto ?>">
            </div>
            <h2><?= $nombre; ?><h2>
        </div>
        <div id="col2">
            <p><?= $descripcion; ?><p>
        </div>
    </main>
    <footer>
        <p><?= miNombre(); ?></p>
        <p><?= $fecha ?></p>
    </footer>
</body>
</html>

<?= phpInfo() ?>

