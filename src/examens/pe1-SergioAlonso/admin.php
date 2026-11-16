<?php

session_start();


if(!isset($_SESSION["usuarios"]) || $_SESSION["rol"] != "admin"){
  header("Location: index.php");
  exit;
}

?>


<!doctype html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administració</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
        <!-- AQUEST HEADER HA DE SER REUTILITZABLE -->

    <?php include("./header.php"); ?>
    
    <main class="contenidor">
      <section class="panell">
        <div class="navegacio">
          <div>
            <h1>Gestió de preguntes</h1>
            <p class="subtitol">Banc de preguntes del Trivial</p>
          </div>
          <a class="btn" href="pregunta_formulari.php">+ Nova pregunta</a>
        </div>
        <div class="taula-responsive">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Categoria</th>
                <th>Enunciat</th>
                <th>Accions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($_SESSION["preguntas"] as $id => $pregunta):?>
                <tr>
                  <td><?=$pregunta["id"]?></td>
                  <td><?=$pregunta["categoria"]?></td>
                  <td><?=$pregunta["pregunta"]?></td>
                  <td>
                    <a class="btn btn-sec" href="pregunta_formulari.php?id=<?=$pregunta["id"]?>"
                      >Editar</a
                    >
                    <a href="delete.php?id=<?=$pregunta["id"]?>" class="btn btn-perill" type="button">Eliminar</button>
                  </td>
                </tr>
              <? endforeach ?>
            </tbody>
          </table>
        </div>
        <p class="nota">
          Les accions són decoratives: VOSALTRES heu de programar el CRUD, la
          confirmació d'eliminació i la protecció del rol. 
        </p>
      </section>
    </main>
    <footer class="peu">AQUEST FOOTER HA DE SER REUTILITZABLE</footer>
  </body>
</html>
