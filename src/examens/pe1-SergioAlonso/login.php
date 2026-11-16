<?php

session_start();

if(!isset($_SESSION["usuarios"]) || isset($_SESSION["usuari"])){
  header("Location: index.php");
  exit;
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
  foreach($_SESSION["usuarios"] as $usu){
    if($_POST["usuari"] === $usu["usuari"] and password_verify($_POST["password"], $usu["password"])){
      $_SESSION["usuari"] = $usu["usuari"];
      $_SESSION["rol"] = $usu["rol"];
      header("Location: index.php");
      exit;
    }
  }
}

?>


<!doctype html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
        <!-- AQUEST HEADER HA DE SER REUTILITZABLE -->

    <?php include("./header.php"); ?>

    <main class="contenidor">
      <section class="panell ample-mig">
        <h1>Iniciar sessió</h1>
        <p class="subtitol">Accedeix com a jugador o administrador.</p>
        <form action="#" method="post">
          <label class="camp"
            >Nom d'usuari<input name="usuari" type="text" required /></label
          ><label class="camp"
            >Contrasenya<input
              name="password"
              type="password"
              required /></label
          ><button class="btn" type="submit">Entrar</button>
        </form>
        <p class="nota">
          La versió PHP ha de verificar la contrasenya i redirigir segons el
          rol.
        </p>
      </section>
    </main>
    <footer class="peu">AQUEST FOOTER HA DE SER REUTILITZABLE</footer>
  </body>
</html>
