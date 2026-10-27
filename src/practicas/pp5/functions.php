<?php

session_start();

function eliminarLibro($id){
    unset($_SESSION["libros"][$id]);
    header("Location: home.php");
    exit;
};

function agregarLibro($titulo, $autor, $descripcion, $foto){
    $nou =  [
        "id" => count($_SESSION["libros"]),
        "titulo" => $titulo,
        "autor" => $autor,
        "descripcion" => $descripcion,
        "imagen" => $foto, 
    ];
    array_push($_SESSION["libros"], $nou);
    header("Location: home.php");
    exit;
}

function editarLibro($id ,$titulo, $autor, $descripcion, $foto){
    $_SESSION["libros"][$id] = [
        "id" => $id,
        "titulo" => $titulo,
        "autor" =>  $autor,
        "descripcion" => $descripcion,
        "imagen" => $foto, 
    ];
    header("Location: home.php");
    exit;
}

?>