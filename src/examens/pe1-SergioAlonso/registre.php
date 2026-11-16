<?php

session_start();

$mensaje = "";
$nombreRepetido = false;

if(!isset($_SESSION["usuarios"]) || isset($_SESSION["usuari"])){
  header("Location: index.php");
  exit;
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
  foreach($_SESSION["usuarios"] as $usu){
    if($usu["usuari"] === $_POST["usuari"]){
      $nombreRepetido = true;
    }

    if(!$nombreRepetido){
      if($_POST["password"] === $_POST["password2"]){
        $nou = [ 
          "id" => count($_SESSION["usuarios"]), 
          "usuari" => $_POST["usuari"], 
          "password" => password_hash( $_POST["password"], PASSWORD_DEFAULT ), 
          "rol" => "jugador" 
        ];
        array_push($_SESSION["usuarios"], $nou);
        header("Location: login.php");
        exit;
      }else{
        $mensaje = "Las contraseñas no coinciden!";
      }
    }else{
      $mensaje = "El nombre es ya existe!";
    }
  }
}


?>


<!doctype html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registre</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
        <!-- AQUEST HEADER HA DE SER REUTILITZABLE -->

    <?php include("./header.php"); ?>

    
    <main class="contenidor">
      <section class="panell ample-mig">
        <h1>Registre de jugador</h1>
        <p class="subtitol">Crea un compte per poder jugar.</p>
        <form action="#" method="post">
          <label class="camp"
            >Nom d'usuari<input
              type="text"
              name="usuari"
              placeholder="Ex.: anna"
              required /></label
          ><label class="camp"
            >Contrassenya<input
              type="password"
              name="password"
              required /></label
          ><label class="camp"
            >Repeteix la contrassenya<input
              type="password"
              name="password2"
              required /></label
          ><button class="btn" type="submit">Registrar-me</button>
          <p><?=$mensaje?></p>
        </form>
        <p class="nota">
          Els nous comptes han de tenir sempre el rol de jugador.
        </p>
      </section>
    </main>
    <footer class="peu">AQUEST FOOTER HA DE SER REUTILITZABLE</footer>
  </body>
</html>
