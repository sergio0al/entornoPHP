<?php

require_once("config.php");

try{
    $pdo = db();
}catch(PDOException $e){
    die("ERROR DE CONEXIÓN CON BBDDS: " . $e->getMessage());
}



$sql = "SELECT * FROM personatges";
$stmt = $pdo->query($sql);
$personatges = $stmt->fetchAll();




foreach($personatges as $personatge):?>

<div style="border: 1px solid black; border-radius: 8px; box-sizing: border-box; padding: 30px; with: min-content;">
    <img src="<?=$personatge["imatge"]?>">
    <h2><?=$personatge["nom"]?></h2>
    <p><?=$personatge["descripcio"]?></p>
    <div>
        <a href="editar.php?id=<?=$personatge["id"]?>" style="background-color: green; border: 0px; border-radius: 6px; box-sizing: border-box; padding: 10px; font-weight: bold; text-decoration: none; color: white;">Editar</a>
        <a href="" style="background-color: red; border: 0px; border-radius: 6px; box-sizing: border-box; padding: 10px; font-weight: bold; text-decoration: none; color: white;">Eliminar</a>
        <a href="detalls.php?id=<?=$personatge["id"]?>" style="background-color: aqua; border: 0px; border-radius: 6px; box-sizing: border-box; padding: 10px; font-weight: bold; text-decoration: none; color: white;">Detalles</a>
    </div>
</div>

<?php endforeach ?>
