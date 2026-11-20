<?php

require_once("config.php");


try{
    $pdo = db();
    echo "todo bien";
}catch(PDOException $e){
    die("ERROR DE CONEXIÓN AMB BBDD: " . $e->getMessage());
};

$sql = "SELECT * FROM videojocs";
$stmt = $pdo->query($sql);

echo "<pre>";
var_dump($stmt);
echo "</pre>";

$videojocs = $stmt->fetchAll();
// echo "<pre>";
// var_dump($videojocs);
// echo "</pre>";



foreach($videojocs as $id => $juego):?>
<div style="border: 1px solid black; border-radius: 12px; margin-bottom: 20px; cursor: pointer; box-sizing: border-box; padding: 10px;">
    <small><?=$id?></small>
    <h2><?=$juego["nom"]?></h2>
    <small><?=$juego["genere"]?></small>
</div>
<?php endforeach ?>