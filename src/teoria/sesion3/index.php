
<?php

echo "hola";
$array = [1,4,5,"Sergio", true];


#manera 1 --- print_r()
echo "<pre>";
print_r($array);
echo "</pre>";


#manera 2 --- var_dump()
echo "<pre>";
var_dump($array);
echo "</pre>";


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    include("arrayProjecte.php");

    if(isset($_GET["id"])){
        echo "<br>";
        echo "<br>";
        echo($projectes[$_GET["id"]]["nom"]);
        echo "<br>";
        echo($projectes[$_GET["id"]]["tecnologia"]);
        echo "<br>";
        echo($projectes[$_GET["id"]]["horas"]);
        echo "<br>";
        echo($projectes[$_GET["id"]]["estat"]);
        echo "<br>";
    }
    
    ?>
</body>
</html>