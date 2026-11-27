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


foreach($videojocs as $id => $juego):?>
<a href="editar.php?id=<?=$id?>">
    <small><?=$id?></small>
    <h2><?=$juego["nom"]?></h2>
    <small><?=$juego["genere"]?></small>
</a>
<?php endforeach ?>