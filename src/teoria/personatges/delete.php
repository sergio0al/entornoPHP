<?php

require_once("config.php");

try{
    $pdo = db();
}catch(PDOException $e){
    die("ERROR DE CONEXIÓN CON BBDDS: " . $e->getMessage());
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql = "DELETE FROM personatges WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $_POST["id"]]);
}

header("Location: index.php");
exit;

?>