<?php

session_start();
$editar = isset($_GET["id"]) ? true : false;



if(isset($_POST["add"])){
    $nou =  [
        "id" => count($_SESSION["libros"]),
        "titulo" => $_POST["titulo"],
        "autor" => $_POST["autor"],
        "descripcion" => $_POST["descripcion"],
        "imagen" => $_POST["foto"]
    ];

    array_push($_SESSION["libros"], $nou);
    header("Location: home.php");
    exit;
}




if(isset($_POST["editar"])){
    $id = $_POST["id"];
    $_SESSION["libros"][$id] = [
        "id" => $id,
        "titulo" => $_POST["titulo"],
        "autor" => $_POST["autor"],
        "descripcion" => $_POST["descripcion"],
        "imagen" => $_POST["foto"]
    ];
    header("Location: home.php");
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
    <form action="add_edit_book.php" method="post">
        <?php if($editar): ?>
        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
        <?php endif ?>
        <label for="titulo">TITULO <input type="text" id="titulo" name="titulo" value="<?php if($editar){echo $_SESSION["libros"][$_GET["id"]]["titulo"];}?>" required></label>
        <label for="autor">AUTOR <input type="text" id="autor" name="autor" value="<?php if($editar){echo $_SESSION["libros"][$_GET["id"]]["autor"];}?>" required></label>
        <label for="descripcion">DESCRIPCION <input type="text" id="descripcion" name="descripcion" value="<?php if($editar){echo $_SESSION["libros"][$_GET["id"]]["descripcion"];}?>" required></label>
        <label for="foto">IMAGEN <input type="text" id="foto" name="foto" value="<?php if($editar){echo $_SESSION["libros"][$_GET["id"]]["imagen"];}?>" required></label>
        <?php if($editar):?>
        <input type="submit" name="editar" value="Guardar">
        <?php else: ?>
        <input type="submit" name="add" value="Añadir">
        <?php endif ?>
    </form>
</body>
</html>