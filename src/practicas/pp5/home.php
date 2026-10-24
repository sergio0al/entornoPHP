<?php

session_start();


if(!isset($_SESSION["nombre"])){
    header("Location: login.php");
}

$libros = [
    [
        "id" => 1,
        "titulo" => "Cien años de soledad",
        "autor" => "Gabriel García Márquez",
        "descripcion" => "La historia de la familia Buendía en el mítico pueblo de Macondo.",
        "imagen" => "https://m.media-amazon.com/images/I/91i3tP7bfAL._AC_UF1000,1000_QL80_.jpg"
    ],
    [
        "id" => 2,
        "titulo" => "1984",
        "autor" => "George Orwell",
        "descripcion" => "Una distopía sobre vigilancia, control y manipulación de la verdad.",
        "imagen" => "https://m.media-amazon.com/images/I/71sOSrd+JxL._AC_UF1000,1000_QL80_.jpg"
    ],
    [
        "id" => 3,
        "titulo" => "El Quijote",
        "autor" => "Miguel de Cervantes",
        "descripcion" => "Las aventuras de un hidalgo que enloquece leyendo libros de caballerías.",
        "imagen" => "https://m.media-amazon.com/images/I/91i+OTXsu3L._AC_UF1000,1000_QL80_.jpg"
    ],
];

if(!isset($_SESSION["libros"])){
    $_SESSION["libros"] = $libros;
}

$is_admin = $_SESSION["rol"] === "admin" ? true : false;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="<?= $_SESSION["foto"] ?>" alt="Foto de perfil" class="w-25 rounded-circle me-3">
                <div>
                    <h4 class="m-0">👋 Bienvenido, <?= $_SESSION["nombre"] ?>!</h4>
                    <?php
                    if($is_admin):?>
                    <p class="text-muted m-0"><i class="fas fa-user-shield text-success"></i> Admin ✏️</p>
                    <?php else: ?>
                    <p class="text-muted m-0">Lector 📚</p>
                    <?php endif ?>
                   
                </div>
            </div>
            <a href="logout.php" class="btn btn-warning btn-sm">
               Cerrar sesión ❌
            </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Biblioteca Virtual</h1>
            <p class="lead">Disfruta explorando nuestra colección de libros</p>
        </div>

                        
        <?php if($is_admin):?>
        <div class="text-center mb-4">
            <a href="add_edit_book.php" class="btn btn-outline-success btn-lg">
                <i class="fas fa-plus-circle me-2"></i>Agregar Nuevo Libro
            </a>
        </div>
        <?php endif ?>
        

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            
                <?php foreach($_SESSION["libros"] as $id => $libro):?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?=$libro["imagen"]?>" class="card-img-top" alt="" style="height: 400px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?=$libro["titulo"]?></h5>
                                <p class="card-text"><strong>Autor:</strong> <?=$libro["autor"]?></p>
                                <p class="card-text"><?=$libro["descripcion"]?></p>
                            </div>

                            <?php if($is_admin):?>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="add_edit_book.php?id=<?=$id?>" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="delete_book.php?id=<?=$id?>" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </a>
                            </div>
                            <?php endif ?>
                        
                        </div>
                    </div>
                <?php endforeach ?>
           
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>