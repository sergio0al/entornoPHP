<?php

session_start();

if(!isset($_SESSION["usuari"]) || !isset($_SESSION["preguntas"])){
  header("Location: index.php");
  exit;
}

$mensaje = "";

if(!isset($_SESSION["pregunta_actual"])){
  $_SESSION["pregunta_actual"] = 0;
  $_SESSION["puntuacion"] = 0;
}


if($_SERVER["REQUEST_METHOD"] === "POST"){
  if($_POST["resposta"] == $_SESSION["preguntas"][$_SESSION["pregunta_actual"]]["correcta"]){
    $_SESSION["puntuacion"] = $_SESSION["puntuacion"] + 2;
    $_SESSION["pregunta_actual"] += 1;
    if($_SESSION["pregunta_actual"] >= count($_SESSION["preguntas"])){
    
    }
  }
}



?>

<!doctype html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trivial</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- AQUEST HEADER HA DE SER REUTILITZABLE -->
     
    <?php include("./header.php"); ?>

    <main class="contenidor">
      <section class="panell">
        <h1>Hola, <?=$_SESSION["usuari"]?>!</h1>
        <p class="subtitol">Respon la pregunta i continua avançant.</p>
        <div class="estadistiques">
          <span><strong>Puntuació:</strong> <?=$_SESSION["puntuacion"];?> punts</span
          ><span><strong>Progrés:</strong> <?=$_SESSION["pregunta_actual"]?> de <?=count($_SESSION["preguntas"])?></span
          ><span><strong>Pendents:</strong> <?= (count($_SESSION["preguntas"]) - $_SESSION["pregunta_actual"] )?></span>
        </div>
        <span class="etiqueta">Geografia</span>
        <h2 style="margin-top: 15px">
          <?= $_SESSION["preguntas"][$_SESSION["pregunta_actual"]]["pregunta"]?>
        </h2>
        <form method="post" action="joc.php">
          <?php foreach($_SESSION["preguntas"][$_SESSION["pregunta_actual"]]["opcions"] as $id => $resposta): ?>
          <label class="resposta"><input type="radio" name="resposta" value="<?=$id?>" /><?=$resposta?></label>
          <? endforeach ?>
          <button>Comprobar</button>
        </form>
        <div class="alerta">
          <?=$mensaje?>
        </div>
        <p class="nota">
          La pregunta, la puntuació i el progrés són dades fictícies. La versió
          PHP ha d'obtenir-les de la sessió.
        </p>
      </section>
    </main>
    <footer class="peu">AQUEST FOOTER HA DE SER REUTILITZABLE</footer>
  </body>
</html>
