<?php

session_start();

if(!isset($_SESSION["nombre"]) or !isset($_SESSION["preguntas"])){
    header("Location: index.php");
    exit;
}

$message = "";
$fin = false;

$nombre = $_SESSION["nombre"];
$dificultat = $_SESSION["nivel"];
$habitacion = $_SESSION["habitacion"];

$pregunta = $_SESSION["preguntas"][$dificultat][$habitacion-1]["pregunta"];
$respuesta = $_SESSION["preguntas"][$dificultat][$habitacion-1]["respuesta"];


if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["answer"])){
        if($_POST["answer"] === $respuesta){
            if($_SESSION["habitacion"] === 5){
                $fin = true;
            }else{
                $_SESSION["habitacion"] += 1;
                header("Location: room.php");
                exit;
            }
        }else{
            $message = "Respuesta incorrecta : (";
        }
    }else{
        header("Location: index.php");
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación <?=$habitacion?></title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <h2 class="card-title text-center">Habitación <?= $_SESSION["habitacion"] ?></h2>
        <p class="card-text"><?php if(!$fin):?>Endevinalla: <?= $pregunta?><?php else: ?> Felicidades has superado el escape room <?=$nombre?>!<?php endif ?></p>
        <form action="room.php" method="POST">
            <?php if(!$fin):?>
            <div class="mb-3">
                <input type="text" name="answer" class="form-control" required placeholder="Respuesta">
            </div>
            <?php endif;?>
            <button type="submit" class="btn btn-success w-100"><?php if($fin): ?> Volver <?php else: ?> Enviar <?php endif ?></button>
        </form>
        <?= $message; ?> 
    </div>
</body>
</html>
