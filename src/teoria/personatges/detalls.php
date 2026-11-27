<?php

require_once("config.php");

try{
    $pdo = db();
}catch(PDOException $e){
    die("ERROR DE CONEXIÓN CON BBDDS: " . $e->getMessage());
}




if($_SERVER["REQUEST_METHOD"] === "GET"){
    $sql = "SELECT * FROM personatges WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $_GET["id"]]);
    $personatges = $stmt->fetch();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
</head>
<body>

    <h1><?= $personatges["nom"] ?? "" ?></h1>

    <p><strong>ID:</strong> <?= $personatges["id"] ?? "" ?></p>
    <p><strong>Usuari ID:</strong> <?= $personatges["usuari_id"] ?? "" ?></p>
    <p><strong>Videojoc ID:</strong> <?= $personatges["videojoc_id"] ?? "" ?></p>
    <p><strong>Nom:</strong> <?= $personatges["nom"] ?? "" ?></p>
    <p><strong>Descripció:</strong> <?= $personatges["descripcio"] ?? "" ?></p>
    <p><strong>Imatge:</strong> <?= $personatges["imatge"] ?? "Sense imatge" ?></p>
    <p><strong>Creat el:</strong> <?= $personatges["creat_el"] ?? "" ?></p>

    <a href="editar.php?id=<?= $personatges["id"] ?>">Editar</a>
    <a href="index.php">Volver</a>

    <form action="eliminar.php" method="post">
        <input type="hidden" name="id" value="<?= $personatges["id"] ?>">
        <button type="submit">Eliminar</button>
    </form>

</body>
</html>