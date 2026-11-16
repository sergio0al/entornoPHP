<?php


session_start();
include("./dades.php");

if(!isset($_SESSION["usuarios"])){
  $_SESSION["usuarios"] = $usuaris;
  $_SESSION["preguntas"] = $preguntes;
}


?>

<!doctype html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inici</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
        <!-- AQUEST HEADER HA DE SER REUTILITZABLE -->

    <?php include("./header.php"); ?>
    
    <main class="contenidor">
      <section class="panell">
        <span class="etiqueta">Examen pràctic · PHP</span>
        <h1>Benvingut al Trivial</h1>
        <p class="subtitol">
          Una aplicació de preguntes de cultura general: quatre categories i
          vuit preguntes inicials.
        </p>
        <div class="grid">
          <?php if(!isset($_SESSION["usuari"])):?>
            <div>
              <h2>Soc jugador</h2>
              <p>Registra't, inicia sessió i supera les preguntes una a una.</p>
              <a class="btn" href="registre.php">Crear compte</a>
              <a class="btn btn-sec" href="login.php">Ja tinc compte</a>
            </div>
          <? endif ?>
          <?php if(isset($_SESSION["usuari"])):?>
            <div>
              <h2>Bienvenido <?=$_SESSION["usuari"]?>!</h2>
              <a class="btn" href="logout.php">Cerrar session</a>
            </div>
          <? endif ?>
          <?php if(isset($_SESSION["rol"]) and $_SESSION["rol"] == "admin"):?>
            <div>
              <h2>Soc administrador</h2>
              <p>
                Gestiona el banc de preguntes: consulta, afegeix, edita i elimina.
              </p>
              <a class="btn btn-sec" href="admin.php">Veure exemple del CRUD</a>
            </div>
          <? endif ?>
        </div>
        
      </section>
    </main>
    <footer class="peu">AQUEST FOOTER HA DE SER REUTILITZABLE</footer>
  </body>
</html>
