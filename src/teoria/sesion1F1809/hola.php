

<?php 

$nombre = "Sergio Alonso Rojals";
$edad = 19;
$descripcion = "Estudiante de FP de Desarrollo de Aplicaciones Web (DAW), con interés en la programación y el desarrollo de páginas y aplicaciones web. Responsable, con ganas de aprender y mejorar sus conocimientos en tecnologías web.";
$centro = "FPLLEFIA";
$curso = "DAW2";



echo ("<div id="carta">
        <div id="fotoContainer">
            <img src="./images/foto.webp">
        </div>
        <h1>" . $nombre. "</h1>   
        <small>" . $edad . "</small>

        
        <p id="descripcion">". $descripcion . "; ?> </p>
        <p>" . $centro."/".$curso. "</p>
    </div>");



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
    <!--
    <div id="carta">
        <div id="fotoContainer">
            <img src="./images/foto.webp">
        </div>
        <h1><?php echo "$nombre"; ?></h1>   
        <small><?php echo "$edad"; ?></small>

        
        <p id="descripcion"><?php echo "$descripcion"; ?> </p>
        <p><?php echo "$centro/$curso"; ?></p>
    </div>
    !-->
</body>
</html>
