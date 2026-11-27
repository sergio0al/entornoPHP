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


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql = "UPDATE personatges SET nom = :nom, descripcio = :descripcio, imatge = :imatge WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "nom" => $_POST["nom"],
        "descripcio" => $_POST["descripcio"],
        "imatge" => $_POST["imatge"] !== "" ? $_POST["imatge"] : null,
        "id" => $_POST["id"]
    ]);
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="editar.php" method="post">

        <input type="hidden" name="id" value="<?= $personatges["id"] ?? "" ?>">

        <label for="usuari_id">Usuari ID:</label>
            <input type="number" id="usuari_id" name="usuari_id" readonly value="<?= $personatges["usuari_id"] ?? "" ?>">
        <br><br>

        <label for="videojoc_id">Videojoc ID:</label>
            <input type="number" id="videojoc_id" name="videojoc_id" readonly value="<?= $personatges["videojoc_id"] ?? "" ?>">
        <br><br>

        <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required value="<?= $personatges["nom"] ?? "" ?>">
        <br><br>

        <label for="descripcio">Descripció:</label>
        <textarea id="descripcio" name="descripcio" rows="4" cols="40"><?= $personatges["descripcio"] ?? "" ?></textarea>
        <br><br>

        <label for="imatge">Imatge:</label>
        <input type="text" id="imatge" name="imatge" value="<?= $personatges["imatge"] ?? "" ?>">
        <br><br>

        <label for="creat_el">Creat el:</label>
        <input type="text" id="creat_el" name="creat_el" readonly value="<?= $personatges["creat_el"] ?? "" ?>">
        <br><br>

        <button type="submit">Guardar</button>

    </form>
</body>
</html>